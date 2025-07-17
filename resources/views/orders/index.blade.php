@extends('layouts.app')
@section('title', 'Orders')
@section('content')

<table class="w-full">
    <tr class="bg-gray-200">
        <th class="p-2 border border-gray-300">Order Date</th>
        <th class="p-2 border border-gray-300">Product Picture</th>
        <th class="p-2 border border-gray-300">Product Name</th>
        <th class="p-2 border border-gray-300">Product Price</th>
        <th class="p-2 border border-gray-300">Quantity</th>
        <th class="p-2 border border-gray-300">Total Amount</th>
        <th class="p-2 border border-gray-300">Customer Name</th>
        <th class="p-2 border border-gray-300">Phone</th>
        <th class="p-2 border border-gray-300">Address</th>
        <th class="p-2 border border-gray-300">Payment Method</th>
        <th class="p-2 border border-gray-300">Payment Status</th>
        <th class="p-2 border border-gray-300">Order Status</th>
        <th class="p-2 border border-gray-300">Actions</th>
    </tr>
    @foreach($orders as $order)
        <tr>
            <td class="p-2 border border-gray-300">{{ $order->created_at}}</td>
            <td class="p-2 border border-gray-300">
                <img src="{{ asset ('/images/products/'.$order->product->photopath) }}" alt="" class="w-16 h-16 object-cover">
            </td>
            <td class="p-2 border border-gray-300">{{ $order->product->name }}</td>
            <td class="p-2 border border-gray-300">{{ $order->product->price }}</td>
            <td class="p-2 border border-gray-300">{{ $order->quantity }}</td>
            <td class="p-2 border border-gray-300">{{ $order->price * $order->quantity }}</td>
            <td class="p-2 border border-gray-300">{{ $order->name }}</td>
            <td class="p-2 border border-gray-300">{{ $order->phone }}</td>
            <td class="p-2 border border-gray-300">{{ $order->address }}</td>
            <td class="p-2 border border-gray-300">{{ $order->payment_method }}</td>
            <td class="p-2 border border-gray-300">{{ $order->payment_status }}</td>
            <td class="p-2 border border-gray-300">{{ $order->order_status }}</td>
            <td class="p-2 flex flex-wrap min-w-48 gap-3">
                <a href="{{route('orders.status',[$order->id,'Pending'])}}" class="bg-blue-400 p-2">pe</a>
                <a href="{{route('orders.status',[$order->id,'Processing'])}}" class="bg-yellow-400 p-2">pr</a>
                <a href="{{route('orders.status',[$order->id,'Delivered'])}}" class="bg-red-400 p-2">de</a>
                <a href="{{route('orders.status',[$order->id,'Cancelled'])}}" class="bg-green-400 p-2  ">ca</a>

            </td>
        </tr>
    @endforeach
</table>
    
@endsection