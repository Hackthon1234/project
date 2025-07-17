<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $cartid = $request->input('cartid');
        $cart = Cart::find($cartid);
        $data=[
            'user_id' => auth()->id(),
            'product_id' => $cart->product_id,
            'price' => $cart->product->discounted_price != null ? $cart->product->discounted_price : $cart->product->price,
            'quantity' => $cart->quantity,
            'name' => $cart->user->name,
            'address' => 'Chitwan',
            'phone' => '9841234567',
        ];
        $order = Order::create($data);
        $cart->delete();
        // Send email notification to user
        $this->sendNewOrderEmail($order->id);
        return redirect()->route('mycart')->with('success', 'Order placed successfully');
    }
    public function storeEsewa(Request $request, $cartid)
    {
        $data = $request->data;
        $data = base64_decode($data);
        $data = json_decode($data, true);
        if($data['status'] == 'COMPLETE')
        {
            $cart =Cart::find($cartid);
            $orderData = [
                'user_id' => auth()->id(),
                'product_id' => $cart->product_id,
                'price' => $cart->product->discounted_price != null ? $cart->product->discounted_price : $cart->product->price,
                'quantity' => $cart->quantity,
                'name' => $cart->user->name,
                'address' => 'Chitwan',
                'phone' => '9841234567',
                'payment_method' => 'esewa',
                'payment_status' => 'Paid',
            ];
            Order::create($orderData);
            $cart->delete();
            // Send email notification to user
            $this->sendNewOrderEmail($cart->id);
            return redirect()->route('mycart')->with('success', 'Order placed successfully');
        }
        else
        {
            return redirect()->route('mycart')->with('success', 'Payment failed');
        }
    }



    public function index()
    {
        $orders = Order::latest()->get();
        return view('orders.index', compact('orders'));
    }





    public function updateStatus($orderid, $status)
    {
        $order = Order::find($orderid);
        $order->payment_status=$status=='Delivered'?'Paid':'Pending';
        //update the stock of the product
        if(($order->order_status == 'Pending' || $order->order_status == 'Cancelled')
        &&($status == 'Processing' || $status == 'Delivered'))
    {
        //decreas the stock of the product
        $order->product->stock -= $order->quantity;
        $order->product->save();
    }
        //if it is pending or cancelled and status is delivered then increase the stock
        if(($order->order_status == 'Processing' || $order->order_status == 'Delivered')
        &&($status == 'Pending' || $status == 'Cancelled'))

        {
            //increase the stock of the product
            $order->product->stock += $order->quantity;
            $order->product->save();
        }

        
        $order->order_status = $status;
        $order->save();
        // Send email notification to user
        $this->sendEmail($orderid);
        return redirect()->back()->with('success','Order Status Updated Sucessfully');
    }




    public function sendEmail($orderid)
    {
        $order = Order::find($orderid);
        $data=[
            'name' => $order->name,
            'status' => $order->order_status,
        ];
        Mail::send('emails.orderstatus', $data, function($message) use ($order) {
            $message->to($order->user->email)
                    ->subject('Order Status Update Notification');
        });
    }
    public function sendNewOrderEmail($orderid)
    {
        $order = Order::find($orderid);
        $data = [
            'customerName' => $order->name,
        ];
        Mail::send('emails.neworder', $data, function($message) use ($order) {
            $message->to($order->user->email)
                    ->subject('New Order Notification');
        });
    }

    public function cancelorder($orderid)
    {
        $order = Order::where('id', $orderid)
            ->where('user_id', auth()->id())
            ->firstOrFail();
            $order->order_status = 'Cancelled';
            $order->save();
            return redirect()->route('myorders')->with('success', 'Order cancelled successfully');
        }
}        
