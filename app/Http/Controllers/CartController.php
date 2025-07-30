<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
        
        // Get product details for the alert message
        $product = \App\Models\Product::find($data['product_id']);
        
        $data['user_id'] = Auth::id();
        $existingCart = Cart::where('user_id', $data['user_id'])
            ->where('product_id', $data['product_id'])
            ->first();
            
        if ($existingCart) {
            // If the product already exists in the cart, update the quantity
            $existingCart->quantity = $data['quantity'];
            $existingCart->save();
            $message = '✓ Cart updated! Updated quantity for ' . $product->name;
        } else {
            Cart::create($data);
            $message = '✓ Added ' . $product->name . ' to your cart';
        }
        
        // Get updated cart count
        $cartCount = Cart::where('user_id', Auth::id())->sum('quantity');
        
        // Return JSON response for AJAX requests
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'cart_count' => $cartCount,
                'product_name' => $product->name
            ]);
        }
        
        return back()->with('success', $message);
    }

    public function mycart()
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        //if the stock is less than the quantity in the cart, then update the quantity to the available stock
        foreach ($carts as $cart) {
            if($cart->quantity > $cart->product->stock){
                $cart->quantity = $cart->product->stock;
                $cart->save();
            }
        }
        return view('mycart', compact('carts'));
    }

    public function destroy(Request $request, $id)
    {
        $cart = Cart::where('user_id', Auth::id())
            ->where('id', $id)
            ->first();
            
        if($cart){
            $productName = $cart->product->name;
            $cart->delete();
            
            // Get updated cart count
            $cartCount = Cart::where('user_id', Auth::id())->sum('quantity');
            
            // Return JSON response for AJAX requests
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Product has been removed from your cart',
                    'cart_count' => $cartCount,
                    'product_name' => $productName
                ]);
            }
            
            return back()->with('delete', 'Product has been removed from your cart');
        }
        
        // Return JSON response for AJAX requests
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found in your cart'
            ]);
        }
        
        return back()->with('delete', 'Product not found in your cart');
    }

    public function getCartCount()
    {
        $cartCount = Cart::where('user_id', Auth::id())->sum('quantity');
        
        return response()->json([
            'cart_count' => $cartCount
        ]);
    }
}

