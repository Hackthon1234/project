{--
    =====================================================
    VybeCart - Shopping Cart
    =====================================================
    Description: Shopping cart management and checkout process
    Author: VybeCart Team
    Last Modified: 2025-12-28
    =====================================================
--}
{{--
    =====================================================
    VybeCart - Shopping Cart
    =====================================================
    Description: Shopping cart management interface
    Features: Update quantities, remove items, checkout
    Author: VybeCart Team
    =====================================================
--}}

@extends('layouts.master')
@section('title', 'My Cart')
@section('content')
    
    {{-- Cart Page Header --}}
    <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 via-white to-primary-50/30 py-12">
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-gradient-to-br from-purple-100 to-pink-100 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12 text-center" data-aos="fade-up">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-primary-50 border border-primary-200 text-primary-700 text-sm font-semibold mb-6">
                    <i class="ri-shopping-cart-2-line mr-2"></i>
                    YOUR SHOPPING CART
                </div>
                <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">My Cart</h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto font-light">Review and manage your selected items before checkout</p>
            </div>
            
            @if($carts->isEmpty())
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
                <div class="grid grid-cols-1 gap-8">
                    <div class="space-y-6">
                        @foreach($carts as $index => $cart)
                            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-100 transform transition-all duration-300 hover:shadow-xl hover:-translate-y-1" 
                                 data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                                <div class="p-6">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">
                                        <a href="{{route('viewproduct',$cart->product_id)}}" class="group flex-shrink-0">
                                            <div class="relative overflow-hidden rounded-2xl bg-gray-100 w-32 h-32">
                                                <img src="{{asset('images/products/'.$cart->product->photopath)}}" 
                                                     alt="{{ $cart->product->name }}" 
                                                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                                @if($cart->product->discounted_price != '')
                                                    <div class="absolute top-2 left-2 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                                        <i class="ri-fire-line mr-1"></i>SALE
                                                    </div>
                                                @endif
                                            </div>
                                        </a>
                                        
                                        <div class="flex-1 min-w-0">
                                            <a href="{{route('viewproduct',$cart->product_id)}}" class="group">
                                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-primary-600 transition-colors duration-200 mb-2">
                                                    {{$cart->product->name}}
                                                </h3>
                                            </a>
                                            
                                            <div class="inline-flex items-center px-2 py-1 rounded-full bg-primary-50 text-primary-600 text-xs font-medium mb-3">
                                                {{ $cart->product->category->name ?? 'General' }}
                                            </div>
                                            
                                            <div class="flex items-center space-x-3 mb-4">
                                                @if($cart->product->discounted_price != '')
                                                    <span class="text-2xl font-black text-gray-900">Rs. {{$cart->product->discounted_price}}</span>
                                                    <span class="text-lg text-gray-400 line-through">Rs. {{$cart->product->price}}</span>
                                                    <span class="text-xs font-bold text-white bg-gradient-to-r from-red-500 to-pink-500 px-2 py-1 rounded-full">
                                                        {{ number_format((($cart->product->price - $cart->product->discounted_price) / $cart->product->price) * 100) }}% OFF
                                                    </span>
                                                @else
                                                    <span class="text-2xl font-black text-gray-900">Rs. {{$cart->product->price}}</span>
                                                @endif
                                            </div>
                                            
                                            <div class="flex items-center space-x-2">
                                                <i class="ri-stack-line text-primary-500"></i>
                                                <span class="text-sm font-medium text-gray-700">Quantity: <span class="font-bold text-primary-600">{{$cart->quantity}}</span></span>
                                            </div>
                                        </div>
                                        
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
                </div>
                
                <div class="mt-12 flex flex-col sm:flex-row justify-between items-center gap-6 p-8 bg-white rounded-3xl shadow-lg border border-gray-100" data-aos="fade-up" data-aos-delay="300">
                    <a href="/" class="group inline-flex items-center text-primary-600 hover:text-primary-700 font-semibold transition-colors duration-200">
                        <i class="ri-arrow-left-line mr-2 transform group-hover:-translate-x-1 transition-transform duration-200"></i> 
                        Continue Shopping
                    </a>
                    
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <div class="text-sm text-gray-500">Grand Total</div>
                            <div class="text-3xl font-black text-gray-900">
                                Rs. {{ $carts->sum(function($cart) {
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