{--
    =====================================================
    VybeCart - My Orders
    =====================================================
    Description: Order history and tracking interface
    Author: VybeCart Team
    Last Modified: 2025-12-28
    =====================================================
--}
{{--
    =====================================================
    VybeCart - My Orders
    =====================================================
    Description: User order history and tracking
    Features: Order details, status tracking, reorder
    Author: VybeCart Team
    =====================================================
--}}

@extends('layouts.master')
@section('title', 'My Orders')
@section('content')
    <div class="relative overflow-hidden bg-gradient-to-br from-primary-600 via-primary-700 to-purple-800 text-white py-24">
        <div class="absolute -top-20 -right-20 w-96 h-96 bg-gradient-to-br from-white/10 to-white/5 rounded-full mix-blend-overlay filter blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-96 h-96 bg-gradient-to-br from-purple-500/20 to-pink-500/20 rounded-full mix-blend-overlay filter blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full h-full">
            <div class="w-full h-full bg-grid-white/[0.02] bg-grid-pattern"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center" data-aos="fade-up">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white text-sm font-semibold mb-6">
                    <i class="ri-file-list-3-line mr-2"></i>
                    ORDER HISTORY
                </div>
                <h1 class="text-5xl md:text-6xl font-black mb-6">
                    My <span class="text-gradient bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Orders</span>
                </h1>
                <p class="text-xl text-white/80 max-w-3xl mx-auto leading-relaxed">
                    Track and manage all your orders in one convenient place
                </p>
                
                @if(!$orders->isEmpty())
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 mt-16" data-aos="fade-up" data-aos-delay="200">
                        <div class="text-center">
                            <div class="text-4xl font-black text-yellow-300">{{ $orders->count() }}</div>
                            <div class="text-white/70 text-sm uppercase tracking-wider">Total Orders</div>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-black text-yellow-300">{{ $orders->where('order_status', 'Delivered')->count() }}</div>
                            <div class="text-white/70 text-sm uppercase tracking-wider">Delivered</div>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-black text-yellow-300">Rs. {{ $orders->sum(function($order) { return $order->quantity * $order->price; }) }}</div>
                            <div class="text-white/70 text-sm uppercase tracking-wider">Total Spent</div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 via-white to-primary-50/30 py-16">
        <div class="absolute top-20 right-20 w-64 h-64 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        <div class="absolute bottom-20 left-20 w-64 h-64 bg-gradient-to-br from-purple-100 to-pink-100 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($orders->isEmpty())
                <div class="py-32 text-center" data-aos="fade-up">
                    <div class="max-w-md mx-auto">
                        <div class="inline-flex items-center justify-center w-32 h-32 rounded-full bg-gradient-to-br from-gray-100 to-gray-200 mb-8">
                            <i class="ri-shopping-bag-line text-6xl text-gray-400"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">No Orders Yet</h3>
                        <p class="text-gray-600 mb-8 leading-relaxed">
                            Your order history will appear here once you make your first purchase. 
                            Start exploring our amazing products!
                        </p>
                        
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="/" class="btn-primary inline-flex items-center px-8 py-4">
                                <i class="ri-shopping-cart-2-line mr-2"></i>
                                Start Shopping
                            </a>
                            <a href="/categories" class="btn-secondary inline-flex items-center px-8 py-4">
                                <i class="ri-apps-2-line mr-2"></i>
                                Browse Categories
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="mb-12" data-aos="fade-up">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6">
                        <div>
                            <h2 class="text-3xl font-black text-gray-900 mb-2">Order History</h2>
                            <p class="text-gray-600">{{ $orders->count() }} orders found</p>
                        </div>
                        
                        <div class="flex flex-wrap gap-3">
                            <button class="px-4 py-2 bg-primary-500 text-white rounded-xl font-semibold text-sm hover:bg-primary-600 transition-colors">
                                All Orders
                            </button>
                            <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-xl font-semibold text-sm hover:bg-gray-200 transition-colors">
                                Pending
                            </button>
                            <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-xl font-semibold text-sm hover:bg-gray-200 transition-colors">
                                Delivered
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="space-y-6">
                    @foreach ($orders as $index => $order)
                        <div class="card-stack bg-white rounded-3xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-2xl hover:-translate-y-1" 
                             data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="p-8">
                                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                                    <div class="flex-1">
                                        <div class="flex flex-col sm:flex-row sm:items-start gap-6">
                                            <div class="flex items-center space-x-4">
                                                <div class="relative">
                                                    <img src="{{ asset('images/products/' . $order->product->photopath) }}" 
                                                         alt="{{ $order->product->name }}" 
                                                         class="w-20 h-20 rounded-2xl object-cover">
                                                    <div class="absolute -top-2 -right-2 bg-primary-500 text-white text-xs font-bold rounded-full w-8 h-8 flex items-center justify-center">
                                                        {{ $order->quantity }}
                                                    </div>
                                                </div>
                                                <div class="min-w-0 flex-1">
                                                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $order->product->name }}</h3>
                                                    <div class="flex items-center space-x-4 text-sm text-gray-600">
                                                        <div class="flex items-center">
                                                            <i class="ri-calendar-line mr-1"></i>
                                                            {{ $order->created_at->format('M d, Y') }}
                                                        </div>
                                                        <div class="flex items-center">
                                                            <i class="ri-time-line mr-1"></i>
                                                            {{ $order->created_at->format('h:i A') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                                        <div class="text-center lg:text-left">
                                            <div class="text-sm text-gray-500 mb-1">Unit Price</div>
                                            <div class="text-2xl font-black text-gray-900">Rs. {{ $order->price }}</div>
                                        </div>
                                        
                                        <div class="text-center lg:text-left">
                                            <div class="text-sm text-gray-500 mb-1">Total Amount</div>
                                            <div class="text-2xl font-black text-primary-600">Rs. {{ $order->quantity * $order->price }}</div>
                                        </div>
                                        
                                        <div class="text-center lg:text-left">
                                            <div class="text-sm text-gray-500 mb-2">Payment</div>
                                            <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold
                                                {{ $order->payment_status == 'Paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                <i class="ri-bank-card-line mr-1"></i>
                                                {{ $order->payment_method }}
                                            </div>
                                        </div>
                                        
                                        <div class="text-center lg:text-left">
                                            <div class="text-sm text-gray-500 mb-2">Status</div>
                                            <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold
                                                {{ $order->order_status == 'Delivered' ? 'bg-green-100 text-green-800' : 
                                                   ($order->order_status == 'Pending' ? 'bg-yellow-100 text-yellow-800' : 
                                                   'bg-blue-100 text-blue-800') }}">
                                                @if($order->order_status == 'Delivered')
                                                    <i class="ri-check-line mr-1"></i>
                                                @elseif($order->order_status == 'Pending')
                                                    <i class="ri-time-line mr-1"></i>
                                                @else
                                                    <i class="ri-truck-line mr-1"></i>
                                                @endif
                                                {{ $order->order_status }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-8 pt-6 border-t border-gray-100">
                                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                        <div class="text-sm text-gray-500">
                                            Order ID: <span class="font-mono font-semibold text-gray-700">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</span>
                                        </div>
                                        
                                        <div class="flex flex-wrap gap-3">
                                            @if($order->order_status == 'Pending')
                                                <form action="{{ route('order.cancel', $order->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" 
                                                            class="px-6 py-2 bg-red-100 text-red-600 rounded-xl font-semibold text-sm 
                                                                   hover:bg-red-200 transition-all duration-300 transform hover:-translate-y-0.5 
                                                                   flex items-center">
                                                        <i class="ri-close-line mr-1"></i>
                                                        Cancel Order
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            <button class="px-6 py-2 bg-primary-100 text-primary-600 rounded-xl font-semibold text-sm 
                                                           hover:bg-primary-200 transition-all duration-300 transform hover:-translate-y-0.5 
                                                           flex items-center">
                                                <i class="ri-truck-line mr-1"></i>
                                                Track Order
                                            </button>
                                            
                                            <button class="px-6 py-2 bg-gray-100 text-gray-600 rounded-xl font-semibold text-sm 
                                                           hover:bg-gray-200 transition-all duration-300 transform hover:-translate-y-0.5 
                                                           flex items-center">
                                                <i class="ri-repeat-line mr-1"></i>
                                                Reorder
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                
                <div class="mt-16" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-stack bg-gradient-to-r from-primary-50 to-purple-50 rounded-3xl shadow-lg p-8 border border-primary-100">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <i class="ri-bar-chart-line text-primary-500 mr-3"></i>
                            Order Summary
                        </h3>
                        
                        <div class="grid md:grid-cols-4 gap-8">
                            <div class="text-center">
                                <div class="text-3xl font-black text-primary-600 mb-2">{{ $orders->count() }}</div>
                                <div class="text-gray-600 font-semibold">Total Orders</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-black text-green-600 mb-2">{{ $orders->where('order_status', 'Delivered')->count() }}</div>
                                <div class="text-gray-600 font-semibold">Completed</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-black text-yellow-600 mb-2">{{ $orders->where('order_status', 'Pending')->count() }}</div>
                                <div class="text-gray-600 font-semibold">Pending</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-black text-purple-600 mb-2">Rs. {{ $orders->sum(function($order) { return $order->quantity * $order->price; }) }}</div>
                                <div class="text-gray-600 font-semibold">Total Spent</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection