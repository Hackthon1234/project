{{-- 
    =====================================================
    VybeCart - Home Page
    =====================================================
    Description: Main landing page featuring hero slider,
                 categories, trending products, and newsletter
    Author: VybeCart Team
    Last Modified: {{ date('Y-m-d') }}
    =====================================================
--}}

@extends('layouts.master')
@section('title', 'Home')
@section('content')
    
    {{-- Ensure categories are loaded for the page --}}
    @php
        if (!isset($categories)) {
            $categories = \App\Models\Category::orderBy('order', 'asc')->get();
        }
    @endphp
    
    {{-- ===================================
         Hero Section - Product Slider
         ===================================
         Displays trending products in a
         full-width carousel with Swiper.js
    --}}
    <div class="bg-black">
        <div class="swiper heroSwiper w-full">
            <div class="swiper-wrapper">
                @foreach ($trendingProducts as $index => $product)
                    <div class="swiper-slide">
                        <div class="relative w-full h-[80vh] overflow-hidden">
                            {{-- Product background image --}}
                            <img src="{{ asset('images/products/' . $product->photopath) }}"
                                alt="{{ $product->name }}"
                                class="w-full h-full object-cover">
                            
                            {{-- Overlay content with gradient background --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/30 to-transparent flex flex-col justify-end p-8 sm:p-12 md:p-20">
                                <div class="max-w-5xl">
                                    {{-- Sale badge if product has discount --}}
                                    @if ($product->discounted_price != '')
                                        <div class="inline-block bg-gradient-to-r from-red-500 to-pink-500 text-white text-sm font-bold px-4 py-1 rounded-full mb-4">
                                            <i class="ri-fire-line mr-1"></i>SALE {{ number_format((($product->price - $product->discounted_price) / $product->price) * 100) }}% OFF
                                        </div>
                                    @endif
                                    
                                    {{-- Product name --}}
                                    <h2 class="text-3xl sm:text-4xl md:text-5xl font-black text-white mb-4">
                                        {{ $product->name }}
                                    </h2>
                                    
                                    {{-- Rating stars display --}}
                                    <div class="flex items-center mb-6">
                                        <div class="flex text-yellow-400 mr-3">
                                            @php $avgRating = $product->averageRating(); @endphp
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $avgRating)
                                                    <i class="ri-star-fill"></i>
                                                @elseif($i - 0.5 <= $avgRating)
                                                    <i class="ri-star-half-fill"></i>
                                                @else
                                                    <i class="ri-star-line"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <span class="text-white opacity-90">
                                            {{ number_format($avgRating, 1) }} rating
                                        </span>
                                    </div>
                                    
                                    {{-- Price display with discount logic --}}
                                    <div class="flex items-center gap-4 mb-8">
                                        @if ($product->discounted_price != '')
                                            <span class="text-2xl sm:text-3xl font-black text-white">Rs. {{ $product->discounted_price }}</span>
                                            <span class="text-lg text-white/70 line-through">Rs. {{ $product->price }}</span>
                                        @else
                                            <span class="text-2xl sm:text-3xl font-black text-white">Rs. {{ $product->price }}</span>
                                        @endif
                                    </div>
                                    
                                    {{-- Call to action button --}}
                                    <a href="{{ route('viewproduct', $product->id) }}" class="inline-block bg-white text-gray-900 px-8 py-4 rounded-full font-semibold text-lg hover:bg-primary-500 hover:text-white transition-all duration-300">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- Pagination dots for slider --}}
            <div class="swiper-pagination"></div>
        </div>
    </div>
    
    {{-- ===================================
         Swiper Initialization Script
         ===================================
         Configures the hero slider with
         autoplay and fade transitions
    --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize hero slider
            new Swiper('.heroSwiper', {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    renderBullet: function (index, className) {
                        return '<span class="' + className + '"></span>';
                    },
                }
            });
        });
    </script>
    
    {{-- ===================================
         Categories Section
         ===================================
         Displays all product categories
         in a responsive grid layout
    --}}
    <div class="py-20 bg-gray-50" id="categories">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Section header --}}
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-4">
                    <span class="text-gradient">Browse Categories</span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-primary-400 to-primary-600 rounded-full mx-auto mb-6"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto font-light leading-relaxed">
                    Find exactly what you need from our carefully curated categories.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach ($categories as $index => $category)
                    <div class="group" data-aos="fade-up" data-aos-duration="600" data-aos-delay="{{ $index * 100 }}">
                        <a href="{{ route('products.all', ['category' => $category->id]) }}" 
                           class="block bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 overflow-hidden">
                            
                            <div class="relative h-48 bg-gradient-to-br from-primary-50 to-primary-100 flex items-center justify-center overflow-hidden">
                                <div class="absolute inset-0 opacity-10">
                                    <div class="absolute top-4 left-4 w-8 h-8 rounded-full bg-primary-300"></div>
                                    <div class="absolute top-8 right-6 w-4 h-4 rounded-full bg-primary-400"></div>
                                    <div class="absolute bottom-6 left-8 w-6 h-6 rounded-full bg-primary-200"></div>
                                    <div class="absolute bottom-4 right-4 w-3 h-3 rounded-full bg-primary-500"></div>
                                </div>
                                
                                <div class="relative z-10 w-20 h-20 bg-white rounded-2xl shadow-lg flex items-center justify-center text-primary-600 group-hover:scale-110 group-hover:bg-primary-500 group-hover:text-white transition-all duration-300">
                                    @if(strtolower($category->name) == 'clothing' || strtolower($category->name) == 'fashion')
                                        <i class="ri-shirt-line text-3xl"></i>
                                    @elseif(strtolower($category->name) == 'electronics' || strtolower($category->name) == 'electronic')
                                        <i class="ri-smartphone-line text-3xl"></i>
                                    @elseif(strtolower($category->name) == 'tools' || strtolower($category->name) == 'hardware')
                                        <i class="ri-tools-line text-3xl"></i>
                                    @elseif(strtolower($category->name) == 'books' || strtolower($category->name) == 'book')
                                        <i class="ri-book-line text-3xl"></i>
                                    @elseif(strtolower($category->name) == 'sports' || strtolower($category->name) == 'fitness')
                                        <i class="ri-football-line text-3xl"></i>
                                    @elseif(strtolower($category->name) == 'beauty' || strtolower($category->name) == 'cosmetics')
                                        <i class="ri-palette-line text-3xl"></i>
                                    @elseif(strtolower($category->name) == 'home' || strtolower($category->name) == 'furniture')
                                        <i class="ri-home-4-line text-3xl"></i>
                                    @elseif(strtolower($category->name) == 'jewelry' || strtolower($category->name) == 'accessories')
                                        <i class="ri-gem-line text-3xl"></i>
                                    @elseif(strtolower($category->name) == 'toys' || strtolower($category->name) == 'games')
                                        <i class="ri-gamepad-line text-3xl"></i>
                                    @elseif(strtolower($category->name) == 'automotive' || strtolower($category->name) == 'car')
                                        <i class="ri-car-line text-3xl"></i>
                                    @else
                                        <i class="ri-shopping-bag-3-line text-3xl"></i>
                                    @endif
                                </div>
                                
                                @if($index < 3)
                                    <div class="absolute top-4 right-4 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        POPULAR
                                    </div>
                                @endif
                            </div>
                            
                            <div class="p-6 text-center">
                                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-primary-600 transition-colors duration-300">
                                    {{ $category->name }}
                                </h3>
                                <p class="text-gray-600 text-sm mb-4">
                                    @php
                                        $productCount = $category->products()->count();
                                    @endphp
                                    {{ $productCount }} {{ $productCount === 1 ? 'Product' : 'Products' }}
                                </p>
                                
                                <div class="inline-flex items-center text-primary-600 text-sm font-semibold group-hover:text-primary-700 transition-colors duration-300">
                                    <span>Shop Now</span>
                                    <i class="ri-arrow-right-line ml-2 transform group-hover:translate-x-1 transition-transform duration-300"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-16 text-center" data-aos="fade-up" data-aos-delay="400">
                <a href="{{ route('products.all') }}" 
                   class="group inline-flex items-center px-10 py-4 bg-gradient-to-r from-primary-500 to-primary-600 text-white rounded-2xl font-semibold text-lg shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 hover:scale-105 relative overflow-hidden">
                    <span class="absolute inset-0 bg-gradient-to-r from-primary-600 to-primary-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    <span class="relative flex items-center">
                        <i class="ri-apps-2-line mr-3 text-xl"></i>
                        View All Categories
                        <i class="ri-arrow-right-line ml-3 transform group-hover:translate-x-1 transition-transform duration-300"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="py-32 bg-white relative overflow-hidden" id="latest-products">
        <div class="absolute top-20 right-10 w-32 h-32 bg-primary-100 rounded-full mix-blend-multiply filter blur-2xl opacity-70"></div>
        <div class="absolute bottom-20 left-10 w-40 h-40 bg-purple-100 rounded-full mix-blend-multiply filter blur-2xl opacity-70"></div>
        
        <div class="relative max-w-7xl mx-auto px-6">
            <div class="mb-20 text-center" data-aos="fade-up" data-aos-duration="800">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-primary-50 to-purple-50 border border-primary-200 text-primary-700 text-sm font-semibold mb-6">
                    <i class="ri-fire-line mr-2 animate-pulse"></i>
                    WHAT'S NEW & TRENDING
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">
                    Latest <span class="text-gradient">Arrivals</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto font-light leading-relaxed">
                    Discover our newest additions, carefully selected to keep you ahead of trends. 
                    <span class="font-medium text-primary-600">Fresh picks</span> from top brands worldwide.
                </p>
                <div class="w-32 h-1 bg-gradient-to-r from-primary-400 to-purple-400 rounded-full mx-auto mt-8"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($latestproducts as $index => $product)
                    <div class="group relative" data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ $index * 100 }}">
                        <div class="card-stack bg-white rounded-3xl shadow-lg overflow-hidden transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-3 hover:rotate-1">
                            <div class="relative aspect-square overflow-hidden bg-gray-100">
                                <img src="{{ asset('images/products/' . $product->photopath) }}"
                                    alt="{{ $product->name }}"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                
                                @if ($product->discounted_price != '')
                                    <div class="absolute top-4 left-4 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs font-bold uppercase tracking-wider px-3 py-2 rounded-full shadow-lg">
                                        <i class="ri-fire-line mr-1"></i>SALE
                                    </div>
                                @endif
                                
                                <div class="absolute top-4 right-4 bg-gradient-to-r from-primary-500 to-primary-600 text-white text-xs font-bold uppercase tracking-wider px-3 py-2 rounded-full shadow-lg">
                                    NEW
                                </div>
                                
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center">
                                    <div class="flex items-center gap-3 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                        <a href="{{ route('viewproduct', $product->id) }}" 
                                           class="w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center text-gray-700 hover:bg-primary-500 hover:text-white transition-all duration-300 transform hover:scale-110 shadow-lg">
                                            <i class="ri-eye-line text-lg"></i>
                                        </a>
                                        <form action="{{ route('cart.store') }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center text-gray-700 hover:bg-primary-500 hover:text-white transition-all duration-300 transform hover:scale-110 shadow-lg">
                                                <i class="ri-shopping-cart-2-line text-lg"></i>
                                            </button>
                                        </form>
                                        @auth
                                            <button onclick="toggleWishlist({{ $product->id }}, this)" 
                                                    class="w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center text-gray-700 hover:bg-red-500 hover:text-white transition-all duration-300 transform hover:scale-110 shadow-lg wishlist-btn"
                                                    data-product-id="{{ $product->id }}">
                                                @if(auth()->user()->wishlists->contains('product_id', $product->id))
                                                    <i class="ri-heart-fill text-lg text-red-500"></i>
                                                @else
                                                    <i class="ri-heart-line text-lg"></i>
                                                @endif
                                            </button>
                                        @else
                                            <a href="{{ route('login') }}" class="w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center text-gray-700 hover:bg-red-500 hover:text-white transition-all duration-300 transform hover:scale-110 shadow-lg">
                                                <i class="ri-heart-line text-lg"></i>
                                            </a>
                                        @endauth
                                    </div>
                                </div>
                                
                                @if($product->stock <= 5)
                                    <div class="absolute bottom-4 left-4 bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                        Only {{ $product->stock }} left!
                                    </div>
                                @endif
                            </div>
                            
                            <div class="p-6">
                                <div class="inline-flex items-center px-2 py-1 rounded-full bg-primary-50 text-primary-600 text-xs font-medium mb-3">
                                    {{ $product->category->name ?? 'General' }}
                                </div>
                                
                                <a href="{{ route('viewproduct', $product->id) }}">
                                    <h3 class="font-bold text-gray-900 group-hover:text-primary-600 transition-colors text-lg line-clamp-2 mb-3 leading-tight">
                                        {{ $product->name }}
                                    </h3>
                                </a>
                                
                                <div class="flex items-center mb-4">
                                    <div class="flex text-yellow-400 mr-2">
                                        @php $avgRating = $product->averageRating(); @endphp
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $avgRating)
                                                <i class="ri-star-fill text-sm"></i>
                                            @elseif($i - 0.5 <= $avgRating)
                                                <i class="ri-star-half-fill text-sm"></i>
                                            @else
                                                <i class="ri-star-line text-sm text-gray-300"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    @if($product->totalReviews() > 0)
                                        <span class="text-xs text-gray-500 font-medium">({{ number_format($avgRating, 1) }}) {{ $product->totalReviews() }} reviews</span>
                                    @else
                                        <span class="text-xs text-gray-500 font-medium">No reviews yet</span>
                                    @endif
                                </div>
                                
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex flex-col">
                                        @if ($product->discounted_price != '')
                                            <span class="text-2xl font-black text-gray-900">Rs. {{ $product->discounted_price }}</span>
                                            <span class="text-sm text-gray-400 line-through">Rs. {{ $product->price }}</span>
                                        @else
                                            <span class="text-2xl font-black text-gray-900">Rs. {{ $product->price }}</span>
                                            <span class="text-sm text-transparent">spacer</span>
                                        @endif
                                    </div>
                                    @if ($product->discounted_price != '')
                                        <span class="text-xs font-bold text-white bg-gradient-to-r from-red-500 to-pink-500 px-2 py-1 rounded-full">
                                            {{ number_format((($product->price - $product->discounted_price) / $product->price) * 100) }}% OFF
                                        </span>
                                    @endif
                                </div>
                                
                                <a href="{{ route('viewproduct', $product->id) }}"
                                   class="w-full inline-block text-center py-3 px-6 rounded-2xl border-2 border-gray-200 text-gray-700 font-semibold 
                                        hover:bg-gradient-to-r hover:from-primary-500 hover:to-primary-600 hover:text-white hover:border-transparent 
                                        transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-20 text-center" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                <a href="{{ route('products.all') }}"
                   class="group inline-flex items-center px-10 py-4 bg-gradient-to-r from-primary-500 to-primary-600 text-white rounded-2xl font-semibold text-lg shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 hover:scale-105 relative overflow-hidden">
                    <span class="absolute inset-0 bg-gradient-to-r from-primary-600 to-primary-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    <span class="relative flex items-center">
                        <i class="ri-store-2-line mr-3 text-xl"></i>
                        View All Products
                        <i class="ri-arrow-right-line ml-3 transform group-hover:translate-x-1 transition-transform duration-300"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="py-24 bg-white relative overflow-hidden">
        <div class="absolute top-0 left-0 w-64 h-64 bg-teal-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-indigo-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 translate-x-1/2 translate-y-1/2"></div>
        
        <div class="relative max-w-7xl mx-auto px-6">
            <div class="mb-16 text-center">
                <h2 class="text-sm font-semibold tracking-wider text-teal-500 uppercase">WHY CHOOSE US</h2>
                <p class="mt-2 text-3xl font-bold text-gray-900 sm:text-4xl">The VybeCart Experience</p>
                <p class="mt-4 text-lg text-gray-500 max-w-xl mx-auto">We're committed to providing the best shopping experience with quality guarantees.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="relative p-8 bg-white rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl transition-shadow group hover-lift">
                    <div class="absolute -top-5 -left-5">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-r from-teal-500 to-teal-400 flex items-center justify-center text-white shadow-lg">
                            <span class="font-semibold text-lg">1</span>
                        </div>
                    </div>
                    <div class="bg-teal-50 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 text-teal-600 group-hover:bg-teal-500 group-hover:text-white transition-colors">
                        <i class="ri-truck-line text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Free & Fast Delivery</h3>
                    <p class="text-gray-600">Enjoy complimentary shipping on all orders over $100. Quick delivery right to your doorstep.</p>
                    <div class="mt-6 h-1 w-12 bg-gradient-to-r from-teal-500 to-teal-400 rounded-full group-hover:w-24 transition-all duration-300"></div>
                </div>
                
                <div class="relative p-8 bg-white rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl transition-shadow group hover-lift">
                    <div class="absolute -top-5 -left-5">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-r from-teal-500 to-teal-400 flex items-center justify-center text-white shadow-lg">
                            <span class="font-semibold text-lg">2</span>
                        </div>
                    </div>
                    <div class="bg-teal-50 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 text-teal-600 group-hover:bg-teal-500 group-hover:text-white transition-colors">
                        <i class="ri-shield-check-line text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Secure Payments</h3>
                    <p class="text-gray-600">Shop with peace of mind using our secure payment gateway with advanced encryption.</p>
                    <div class="mt-6 h-1 w-12 bg-gradient-to-r from-teal-500 to-teal-400 rounded-full group-hover:w-24 transition-all duration-300"></div>
                </div>
                
                <div class="relative p-8 bg-white rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl transition-shadow group hover-lift">
                    <div class="absolute -top-5 -left-5">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-r from-teal-500 to-teal-400 flex items-center justify-center text-white shadow-lg">
                            <span class="font-semibold text-lg">3</span>
                        </div>
                    </div>
                    <div class="bg-teal-50 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 text-teal-600 group-hover:bg-teal-500 group-hover:text-white transition-colors">
                        <i class="ri-customer-service-2-line text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">24/7 Customer Support</h3>
                    <p class="text-gray-600">Our dedicated support team is always available to assist you with any questions or concerns.</p>
                    <div class="mt-6 h-1 w-12 bg-gradient-to-r from-teal-500 to-teal-400 rounded-full group-hover:w-24 transition-all duration-300"></div>
                </div>
            </div>
            
            <div class="mt-20 text-center">
                <a href="/about" class="btn-primary inline-block px-8 py-4">
                    Learn More About Our Services
                </a>
            </div>
        </div>
    </div>
    
    
    <div class="py-16 bg-gradient-to-r from-primary-500 to-primary-600 relative overflow-hidden">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full transform translate-x-32 -translate-y-32"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full transform -translate-x-24 translate-y-24"></div>
        
        <div class="relative max-w-4xl mx-auto px-6 text-center">
            <div class="mb-8">
                <div class="inline-flex items-center px-3 py-1 rounded-full bg-white/20 text-white text-sm font-medium mb-4">
                    <i class="ri-mail-line mr-2"></i>
                    Newsletter
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Get Exclusive Deals & Updates
                </h2>
                <p class="text-white/90 text-lg max-w-2xl mx-auto">
                    Join 50K+ subscribers and never miss out on flash sales, new arrivals, and special offers.
                </p>
            </div>
            
            <form id="newsletter-form" class="max-w-lg mx-auto">
                @csrf
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <input type="email" 
                               name="email" 
                               placeholder="Enter your email address" 
                               required
                               class="w-full px-6 py-4 rounded-2xl border-0 bg-white/95 backdrop-blur-sm text-gray-900 placeholder-gray-500 focus:ring-4 focus:ring-white/30 focus:bg-white transition-all duration-300">
                    </div>
                    <button type="submit" 
                            class="px-8 py-4 bg-white text-primary-600 rounded-2xl font-semibold hover:bg-gray-50 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                        <span class="hidden sm:inline">Subscribe</span>
                        <i class="ri-send-plane-2-line sm:hidden text-xl"></i>
                    </button>
                </div>
                
                <p class="mt-4 text-white/70 text-sm">
                    <i class="ri-shield-check-line mr-1"></i>
                    No spam. Unsubscribe anytime. 
                    <a href="#" class="text-white hover:underline">Privacy Policy</a>
                </p>
                
                <div id="newsletter-success" class="hidden mt-6 p-4 bg-white/20 rounded-2xl backdrop-blur-sm">
                    <div class="flex items-center justify-center text-white">
                        <i class="ri-check-circle-line mr-2 text-xl"></i>
                        <span class="font-medium">Success! Check your email for 10% off coupon 🎉</span>
                    </div>
                </div>
            </form>
            
            <div class="mt-8 flex items-center justify-center gap-8 text-white/80">
                <div class="text-center">
                    <div class="text-2xl font-bold">50K+</div>
                    <div class="text-sm">Subscribers</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold">0</div>
                    <div class="text-sm">Spam</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold">24h</div>
                    <div class="text-sm">Response</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('newsletter-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitButton = this.querySelector('button[type="submit"]');
            const successMessage = document.getElementById('newsletter-success');
            
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="ri-loader-line animate-spin text-xl"></i>';
            
            setTimeout(() => {
                successMessage.classList.remove('hidden');
                this.querySelector('input[type="email"]').value = '';
                
                submitButton.disabled = false;
                submitButton.innerHTML = '<span class="hidden sm:inline">Subscribe</span><i class="ri-send-plane-2-line sm:hidden text-xl"></i>';
                
                setTimeout(() => {
                    successMessage.classList.add('hidden');
                }, 5000);
            }, 1500);
        });
    </script>

    <script>
        function toggleWishlist(productId, button) {
            const icon = button.querySelector('i');
            const isInWishlist = icon.classList.contains('ri-heart-fill');
            
            const url = isInWishlist ? `/wishlist/${productId}` : '/wishlist';
            const method = isInWishlist ? 'DELETE' : 'POST';
            
            const body = isInWishlist ? null : JSON.stringify({ product_id: productId });
            
            fetch(url, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
                body: body
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (isInWishlist) {
                        icon.className = 'ri-heart-line text-lg';
                    } else {
                        icon.className = 'ri-heart-fill text-lg text-red-500';
                    }
                    
                    const wishlistCountElement = document.getElementById('user-wishlist-count');
                    if (wishlistCountElement) {
                        const currentCount = parseInt(wishlistCountElement.getAttribute('data-count')) || 0;
                        const newCount = isInWishlist ? currentCount - 1 : currentCount + 1;
                        wishlistCountElement.textContent = newCount;
                        wishlistCountElement.setAttribute('data-count', newCount);
                    }
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating your wishlist.');
            });
        }
    </script>
@endsection