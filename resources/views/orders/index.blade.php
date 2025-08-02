@extends('layouts.app')
@section('title', 'Orders')
@section('content')

<div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 tracking-tight">Orders Management</h2>
        <div class="inline-flex items-center px-4 py-2 rounded-xl bg-gradient-to-r from-indigo-50 to-blue-50 border border-indigo-200 text-indigo-700 text-sm font-semibold">
            <i class="ri-shopping-bag-line mr-2"></i>
            {{ $orders->count() }} Orders
        </div>
    </div>

    <!-- Optional Divider -->
    <div class="border-t border-gray-100 my-4"></div>

    <!-- Orders Table -->
    <div class="overflow-x-auto">
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gradient-to-r from-indigo-50 to-blue-50">
                <tr>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider w-32">Order Date</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Product</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider w-48">Customer</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider w-28">Amount</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider w-28">Payment</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider w-24">Status</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider w-80">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($orders as $order)
                <tr class="hover:bg-blue-50/50 transition-colors duration-150">
                    <!-- Order Date -->
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="text-sm font-medium text-gray-900">{{ $order->created_at->format('M d, Y') }}</div>
                        <div class="text-xs text-gray-500">{{ $order->created_at->format('h:i A') }}</div>
                    </td>
                    
                    <!-- Product Info -->
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset('/images/products/'.$order->product->photopath) }}" 
                                 alt="{{ $order->product->name }}" 
                                 class="h-16 w-16 rounded-lg shadow-sm object-cover flex-shrink-0">
                            <div class="min-w-0">
                                <div class="text-sm font-medium text-gray-900 line-clamp-2">{{ $order->product->name }}</div>
                                <div class="text-xs text-gray-500">Price: ${{ number_format($order->product->price) }}</div>
                                <div class="text-xs text-gray-500">Qty: {{ $order->quantity }}</div>
                            </div>
                        </div>
                    </td>
                    
                    <!-- Customer Info -->
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900 truncate">{{ $order->name }}</div>
                        <div class="text-xs text-gray-500 truncate">{{ $order->phone }}</div>
                        <div class="text-xs text-gray-500 truncate">{{ $order->address }}</div>
                    </td>
                    
                    <!-- Amount -->
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="text-sm font-bold text-gray-900">${{ number_format($order->price * $order->quantity) }}</div>
                        <div class="text-xs text-gray-500">{{ $order->quantity }} × ${{ number_format($order->price) }}</div>
                    </td>
                    
                    <!-- Payment Info -->
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="text-xs text-gray-500 mb-1">{{ $order->payment_method ?? 'N/A' }}</div>
                        <div class="flex justify-center">
                            <span class="px-2 py-1 text-xs rounded-full font-medium
                                @if($order->payment_status == 'Paid') bg-green-100 text-green-800
                                @elseif($order->payment_status == 'Pending') bg-yellow-100 text-yellow-800
                                @else bg-red-100 text-red-800
                                @endif">
                                {{ $order->payment_status }}
                            </span>
                        </div>
                    </td>
                    
                    <!-- Order Status -->
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex justify-center">
                            <span class="px-3 py-1 text-xs rounded-full font-medium
                                @if($order->order_status == 'Delivered') bg-green-100 text-green-800
                                @elseif($order->order_status == 'Processing') bg-blue-100 text-blue-800
                                @elseif($order->order_status == 'Pending') bg-yellow-100 text-yellow-800
                                @else bg-red-100 text-red-800
                                @endif">
                                {{ $order->order_status }}
                            </span>
                        </div>
                    </td>
                    
                    <!-- Actions -->
                    <td class="px-6 py-4">
                        <div class="grid grid-cols-2 gap-2 max-w-xs mx-auto">
                            <a href="{{route('orders.status',[$order->id,'Pending'])}}" 
                               class="inline-flex items-center justify-center px-3 py-1.5 bg-yellow-100 text-yellow-700 text-xs font-medium rounded-lg hover:bg-yellow-200 transition-colors duration-150"
                               title="Mark as Pending">
                                <i class="ri-time-line mr-1"></i>
                                Pending
                            </a>
                            
                            <a href="{{route('orders.status',[$order->id,'Processing'])}}" 
                               class="inline-flex items-center justify-center px-3 py-1.5 bg-blue-100 text-blue-700 text-xs font-medium rounded-lg hover:bg-blue-200 transition-colors duration-150"
                               title="Mark as Processing">
                                <i class="ri-loader-2-line mr-1"></i>
                                Processing
                            </a>
                            
                            <a href="{{route('orders.status',[$order->id,'Delivered'])}}" 
                               class="inline-flex items-center justify-center px-3 py-1.5 bg-green-100 text-green-700 text-xs font-medium rounded-lg hover:bg-green-200 transition-colors duration-150"
                               title="Mark as Delivered">
                                <i class="ri-check-line mr-1"></i>
                                Delivered
                            </a>
                            
                            <a href="{{route('orders.status',[$order->id,'Cancelled'])}}" 
                               class="inline-flex items-center justify-center px-3 py-1.5 bg-red-100 text-red-700 text-xs font-medium rounded-lg hover:bg-red-200 transition-colors duration-150"
                               title="Mark as Cancelled"
                               onclick="return confirm('Are you sure you want to cancel this order?')">
                                <i class="ri-close-line mr-1"></i>
                                Cancel
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        @if($orders->count() == 0)
            <div class="text-center py-12">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                    <i class="ri-shopping-bag-line text-2xl text-gray-400"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No Orders Found</h3>
                <p class="text-gray-500">Orders will appear here once customers start placing them.</p>
            </div>
        @endif
    </div>
</div>

@endsection