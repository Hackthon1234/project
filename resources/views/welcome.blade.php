@extends('layouts.master')
@section('content')
    <!-- Hero Section sajan -->
    <div class="relative bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
        <div class="max-w-7xl mx-auto px-6 py-24">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <h1 class="text-5xl font-bold leading-tight">
                        Discover Amazing Products
                        <span class="block text-blue-200">For Your Lifestyle</span>
                    </h1>
                    <p class="text-lg text-blue-100">
                        Shop the latest trends with confidence. Quality products, amazing deals, and fast delivery.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#latest-products"
                            class="px-8 py-3 bg-white text-blue-600 rounded-full font-medium hover:bg-opacity-90 transition-all transform hover:-translate-y-0.5">
                            Shop Now
                        </a>
                        <a href="#categories"
                            class="px-8 py-3 border border-white/30 rounded-full font-medium hover:bg-white/10 transition-all">
                            Browse Categories
                        </a>
                    </div>
                </div>
                <div class="hidden md:block relative">
                    <div class="absolute inset-0 bg-white/10 blur-3xl rounded-full"></div>
                    <img src="{{ asset('hero-image.jpg') }}" alt="Hero" class="relative rounded-2xl shadow-2xl">
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Products Section -->
    <div class="max-w-7xl mx-auto px-6 py-16" id="latest-products">
        <div class="flex justify-between items-center mb-10">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Latest Products</h2>
                <p class="text-gray-500 mt-2">Discover our newest arrivals</p>
            </div>
            <a href="{{ route('products.index') }}"
                class="text-blue-600 hover:text-blue-700 font-medium flex items-center group">
                View All
                <i class="ri-arrow-right-line ml-2 transform group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($latestproducts as $product)
                <a href="{{ route('viewproduct', $product->id) }}"
                    class="group bg-white rounded-2xl p-4 shadow-sm hover:shadow-xl transition-all duration-300">
                    <div class="relative aspect-square mb-4 rounded-xl overflow-hidden bg-gray-100">
                        <img src="{{ asset('images/products/' . $product->photopath) }}"
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @if ($product->discounted_price != '')
                            <div
                                class="absolute top-3 right-3 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                SALE
                            </div>
                        @endif
                    </div>

                    <div class="space-y-2">
                        <h3 class="font-medium text-gray-900 group-hover:text-blue-600 transition-colors">
                            {{ $product->name }}
                        </h3>

                        <div class="flex items-center space-x-2">
                            @if ($product->discounted_price != '')
                                <span class="text-lg font-bold text-gray-900">${{ $product->discounted_price }}</span>
                                <span class="text-sm text-gray-400 line-through">${{ $product->price }}</span>
                            @else
                                <span class="text-lg font-bold text-gray-900">${{ $product->price }}</span>
                            @endif
                        </div>

                        <div class="pt-2">
                            <button
                                class="w-full bg-gray-100 text-gray-700 py-2 rounded-xl font-medium 
                                       group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="flex items-center space-x-4 p-6 bg-white rounded-2xl shadow-sm">
                    <div class="bg-blue-100 p-3 rounded-xl">
                        <i class="ri-truck-line text-2xl text-blue-600"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">Free Delivery</h3>
                        <p class="text-sm text-gray-500">On orders over $100</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4 p-6 bg-white rounded-2xl shadow-sm">
                    <div class="bg-blue-100 p-3 rounded-xl">
                        <i class="ri-shield-check-line text-2xl text-blue-600"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">Secure Payment</h3>
                        <p class="text-sm text-gray-500">100% secure checkout</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4 p-6 bg-white rounded-2xl shadow-sm">
                    <div class="bg-blue-100 p-3 rounded-xl">
                        <i class="ri-customer-service-2-line text-2xl text-blue-600"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">24/7 Support</h3>
                        <p class="text-sm text-gray-500">Dedicated support</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
