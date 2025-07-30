@extends('layouts.master')
@section('title', 'My Cart')
@section('content')
    <!-- Enhanced Cart Page -->
    <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 via-white to-primary-50/30 py-12">
        <!-- Background Decorations -->
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-gradient-to-br from-purple-100 to-pink-100 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Enhanced Page Header -->
            <div class="mb-12 text-center" data-aos="fade-up">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-primary-50 border border-primary-200 text-primary-700 text-sm font-semibold mb-6">
                    <i class="ri-shopping-cart-2-line mr-2"></i>
                    YOUR SHOPPING CART
                </div>
                <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">My Cart</h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto font-light">Review and manage your selected items before checkout</p>
            </div>
            
            @if($carts->isEmpty())
                <!-- Enhanced Empty Cart State -->
                <div class="py-20 text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="max-w-md mx-auto">
                        <div class="inline-flex items-center justify-center w-32 h-32 rounded-full bg-gradient-to-br from-primary-50 to-primary-100 mb-8">
                            <i class="ri-shopping-cart-line text-6xl text-primary-500"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Your Cart is Empty</h3>
                        <p class="text-gray-600 mb-8 leading-relaxed">Looks like you haven't added any items to your cart yet. Start exploring our amazing products!</p>
                        <a href="/" class="btn-primary inline-flex items-center px-8 py-4 text-lg">
                            <i class="ri-store-2-line mr-3"></i>
                            Start Shopping
                        </a>
                    </div>
                </div>
            @else
                <!-- Enhanced Cart Items -->
                <div class="grid lg:grid-cols-3 gap-8">
                    <!-- Cart Items List -->
                    <div class="lg:col-span-2 space-y-6">
                        @foreach($carts as $index => $cart)
                            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-100 transform transition-all duration-300 hover:shadow-xl hover:-translate-y-1" 
                                 data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                                <div class="p-6">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">
                                        <!-- Product Image -->
                                        <a href="{{route('viewproduct',$cart->product_id)}}" class="group flex-shrink-0">
                                            <div class="relative overflow-hidden rounded-2xl bg-gray-100 w-32 h-32">
                                                <img src="{{asset('images/products/'.$cart->product->photopath)}}" 
                                                     alt="{{ $cart->product->name }}" 
                                                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                                <!-- Sale Badge -->
                                                @if($cart->product->discounted_price != '')
                                                    <div class="absolute top-2 left-2 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                                        SALE
                                                    </div>
                                                @endif
                                            </div>
                                        </a>
                                        
                                        <!-- Product Details -->
                                        <div class="flex-1 min-w-0">
                                            <a href="{{route('viewproduct',$cart->product_id)}}" class="group">
                                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-primary-600 transition-colors duration-200 mb-2">
                                                    {{$cart->product->name}}
                                                </h3>
                                            </a>
                                            
                                            <!-- Category Badge -->
                                            <div class="inline-flex items-center px-2 py-1 rounded-full bg-primary-50 text-primary-600 text-xs font-medium mb-3">
                                                {{ $cart->product->category->name ?? 'General' }}
                                            </div>
                                            
                                            <!-- Price Display -->
                                            <div class="flex items-center space-x-3 mb-4">
                                                @if($cart->product->discounted_price != '')
                                                    <span class="text-2xl font-black text-gray-900">${{$cart->product->discounted_price}}</span>
                                                    <span class="text-lg text-gray-400 line-through">${{$cart->product->price}}</span>
                                                    <span class="text-xs font-bold text-white bg-gradient-to-r from-red-500 to-pink-500 px-2 py-1 rounded-full">
                                                        {{ number_format((($cart->product->price - $cart->product->discounted_price) / $cart->product->price) * 100) }}% OFF
                                                    </span>
                                                @else
                                                    <span class="text-2xl font-black text-gray-900">${{$cart->product->price}}</span>
                                                @endif
                                            </div>
                                            
                                            <!-- Quantity Display -->
                                            <div class="flex items-center space-x-2">
                                                <i class="ri-stack-line text-primary-500"></i>
                                                <span class="text-sm font-medium text-gray-700">Quantity: <span class="font-bold text-primary-600">{{$cart->quantity}}</span></span>
                                            </div>
                                        </div>
                                        
                                        <!-- Action Buttons -->
                                        <div class="flex flex-col gap-3 w-full sm:w-auto">
                                            <a href="{{route('checkout', $cart->id)}}" 
                                               class="group inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-2xl font-semibold hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg">
                                                <i class="ri-secure-payment-line mr-2 group-hover:animate-pulse"></i> 
                                                Checkout Now
                                            </a>
                                            
                                            <form action="{{route('cart.destroy', $cart->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="group inline-flex items-center justify-center px-6 py-3 bg-red-50 text-red-600 border-2 border-red-200 rounded-2xl font-semibold hover:bg-red-100 hover:border-red-300 transition-all duration-300 w-full"
                                                        onclick="return confirm('Are you sure you want to remove this item?')">
                                                    <i class="ri-delete-bin-line mr-2 group-hover:animate-wiggle"></i> 
                                                    Remove Item
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- Enhanced Cart Summary -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 sticky top-8" data-aos="fade-up" data-aos-delay="200">
                            <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                                <i class="ri-calculator-line mr-3 text-primary-500"></i>
                                Order Summary
                            </h3>
                            
                            <!-- Cart Items Count -->
                            <div class="flex justify-between items-center py-4 border-b border-gray-200">
                                <span class="text-gray-600">Items in Cart</span>
                                <span class="font-bold text-gray-900">{{ $carts->count() }}</span>
                            </div>
                            
                            <!-- Total Quantity -->
                            <div class="flex justify-between items-center py-4 border-b border-gray-200">
                                <span class="text-gray-600">Total Quantity</span>
                                <span class="font-bold text-gray-900">{{ $carts->sum('quantity') }}</span>
                            </div>
                            
                            <!-- Subtotal -->
                            <div class="flex justify-between items-center py-4 border-b border-gray-200">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-bold text-gray-900">
                                    ${{ $carts->sum(function($cart) {
                                        return ($cart->product->discounted_price ?: $cart->product->price) * $cart->quantity;
                                    }) }}
                                </span>
                            </div>
                            
                            <!-- Shipping -->
                            <div class="flex justify-between items-center py-4 border-b border-gray-200">
                                <span class="text-gray-600">Shipping</span>
                                <span class="font-bold text-green-600">FREE</span>
                            </div>
                            
                            <!-- Total -->
                            <div class="flex justify-between items-center py-6 bg-gradient-to-r from-primary-50 to-primary-100 -mx-8 px-8 mt-6 rounded-2xl">
                                <span class="text-xl font-bold text-gray-900">Total</span>
                                <span class="text-2xl font-black text-primary-600">
                                    ${{ $carts->sum(function($cart) {
                                        return ($cart->product->discounted_price ?: $cart->product->price) * $cart->quantity;
                                    }) }}
                                </span>
                            </div>
                            
                            <!-- Trust Badges -->
                            <div class="grid grid-cols-2 gap-4 mt-8 pt-6 border-t border-gray-200">
                                <div class="text-center">
                                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                        <i class="ri-shield-check-line text-green-600 text-xl"></i>
                                    </div>
                                    <div class="text-xs font-medium text-gray-700">Secure Checkout</div>
                                </div>
                                <div class="text-center">
                                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                        <i class="ri-truck-line text-blue-600 text-xl"></i>
                                    </div>
                                    <div class="text-xs font-medium text-gray-700">Fast Delivery</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Enhanced Bottom Actions -->
                <div class="mt-12 flex flex-col sm:flex-row justify-between items-center gap-6 p-8 bg-white rounded-3xl shadow-lg border border-gray-100" data-aos="fade-up" data-aos-delay="300">
                    <a href="/" class="group inline-flex items-center text-primary-600 hover:text-primary-700 font-semibold transition-colors duration-200">
                        <i class="ri-arrow-left-line mr-2 transform group-hover:-translate-x-1 transition-transform duration-200"></i> 
                        Continue Shopping
                    </a>
                    
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <div class="text-sm text-gray-500">Grand Total</div>
                            <div class="text-3xl font-black text-gray-900">
                                ${{ $carts->sum(function($cart) {
                                    return ($cart->product->discounted_price ?: $cart->product->price) * $cart->quantity;
                                }) }}
                            </div>
                        </div>
                        <div class="w-px h-16 bg-gray-300"></div>
                        <div class="text-center">
                            <div class="text-sm text-gray-500 mb-2">Ready to checkout?</div>
                            <div class="flex items-center text-green-600">
                                <i class="ri-checkbox-circle-line mr-1"></i>
                                <span class="text-sm font-medium">{{ $carts->count() }} items selected</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection