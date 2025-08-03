@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @php
        // Get categories if not already defined
        if (!isset($categories)) {
            $categories = \App\Models\Category::orderBy('order', 'asc')->get();
        }
    @endphp
    <!-- Modern Hero Section with Advanced Animations -->
    <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 via-white to-primary-50/30" x-data="{ loaded: false }" x-init="setTimeout(() => loaded = true, 100)">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-96 h-96 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-float"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-gradient-to-br from-purple-100 to-pink-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-float" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-br from-primary-50 to-primary-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-pulse-slow"></div>
        </div>
        
        <!-- Hero Content -->
        <div class="relative max-w-7xl mx-auto px-6 py-32 md:py-40">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content with Staggered Animations -->
                <div class="space-y-10">
                    <!-- Badge with Animation -->
                    <div x-show="loaded" x-transition:enter="transition ease-out duration-700 delay-100" 
                         x-transition:enter-start="opacity-0 transform translate-y-4" 
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-primary-50 to-primary-100 border border-primary-200 text-primary-700 text-sm font-semibold shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <div class="flex h-2 w-2 rounded-full bg-primary-500 mr-3 animate-pulse"></div>
                        <span class="bg-gradient-to-r from-primary-600 to-primary-700 bg-clip-text text-transparent">New Collection 2025 ✨</span>
                    </div>

                    <!-- Main Heading with Gradient Animation -->
                    <div x-show="loaded" x-transition:enter="transition ease-out duration-700 delay-200" 
                         x-transition:enter-start="opacity-0 transform translate-y-6" 
                         x-transition:enter-end="opacity-100 transform translate-y-0">
                        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black leading-none tracking-tight text-gray-900 mb-6">
                            Shop <span class="relative">
                                <span class="text-gradient animate-pulse-slow">Smarter</span>
                                <div class="absolute -bottom-2 left-0 right-0 h-1 bg-gradient-to-r from-primary-400 to-primary-600 rounded-full transform scale-x-0 animate-scale-in" style="animation-delay: 1s; animation-fill-mode: forwards;"></div>
                            </span>,
                            <br>Live <span class="text-gradient-purple">Better</span>
                        </h1>
                        <p class="text-xl md:text-2xl text-gray-600 max-w-2xl font-light leading-relaxed">
                            Discover premium products carefully curated for modern living. 
                            <span class="font-medium text-primary-600">Quality, style, and convenience</span> at your fingertips.
                        </p>
                    </div>

                    <!-- CTA Buttons with Hover Effects -->
                    <div x-show="loaded" x-transition:enter="transition ease-out duration-700 delay-300" 
                         x-transition:enter-start="opacity-0 transform translate-y-8" 
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="flex flex-wrap gap-6 pt-8">
                        <a href="{{ route('products.all') }}"
                            class="group relative inline-flex items-center px-8 py-4 bg-gradient-to-r from-primary-500 to-primary-600 text-white rounded-2xl font-semibold text-lg shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 hover:scale-105 overflow-hidden">
                            <span class="absolute inset-0 bg-gradient-to-r from-primary-600 to-primary-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                            <span class="relative flex items-center">
                                <i class="ri-shopping-bag-3-line mr-3 text-xl"></i>
                                Shop Now
                                <i class="ri-arrow-right-line ml-3 transform group-hover:translate-x-1 transition-transform duration-300"></i>
                            </span>
                        </a>
                        <a href="#categories"
                            class="group inline-flex items-center px-8 py-4 bg-white/80 backdrop-blur-sm text-gray-700 rounded-2xl font-semibold text-lg shadow-lg hover:shadow-xl border-2 border-gray-200 hover:border-primary-300 transition-all duration-300 transform hover:-translate-y-1">
                            <i class="ri-grid-3-line mr-3 text-xl text-primary-500"></i>
                            Explore Categories
                        </a>
                    </div>

                    <!-- Trust Indicators -->
                    <div x-show="loaded" x-transition:enter="transition ease-out duration-700 delay-400" 
                         x-transition:enter-start="opacity-0 transform translate-y-10" 
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="flex items-center space-x-8 pt-8">
                        <div class="flex items-center space-x-3">
                            <div class="flex text-yellow-400">
                                <i class="ri-star-fill text-lg"></i>
                                <i class="ri-star-fill text-lg"></i>
                                <i class="ri-star-fill text-lg"></i>
                                <i class="ri-star-fill text-lg"></i>
                                <i class="ri-star-fill text-lg"></i>
                            </div>
                            <div>
                                <div class="text-sm font-bold text-gray-900">4.9/5 Rating</div>
                                <div class="text-xs text-gray-500">Based on 10k+ reviews</div>
                            </div>
                        </div>
                        <div class="w-px h-12 bg-gray-300"></div>
                        <div>
                            <div class="text-sm font-bold text-gray-900">50k+ Customers</div>
                            <div class="text-xs text-gray-500">Trust our platform</div>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Enhanced Visual -->
                <div class="relative hidden lg:block" x-show="loaded" x-transition:enter="transition ease-out duration-1000 delay-500" 
                     x-transition:enter-start="opacity-0 transform translate-x-8 scale-95" 
                     x-transition:enter-end="opacity-100 transform translate-x-0 scale-100">
                    <!-- Background Glow Effects -->
                    <div class="absolute inset-0 bg-gradient-to-r from-primary-400/30 to-purple-400/30 rounded-3xl blur-3xl transform rotate-6"></div>
                    <div class="absolute inset-0 bg-gradient-to-l from-primary-300/20 to-pink-300/20 rounded-3xl blur-3xl transform -rotate-6"></div>
                    
                    <!-- Main Image Container -->
                    <div class="relative group">
                        <div class="overflow-hidden rounded-3xl shadow-2xl border border-white/20 backdrop-blur-sm">
                            <img src="https://images.unsplash.com/photo-1607082349566-187342175e2f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" 
                                 alt="Hero" 
                                 class="w-full h-[700px] object-cover transform group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>
                        </div>
                        
                        <!-- Floating Elements -->
                        <div class="absolute -top-6 -left-6 glass p-6 rounded-2xl shadow-xl animate-float max-w-xs">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="h-12 w-12 rounded-full bg-gradient-to-r from-primary-500 to-primary-600 flex items-center justify-center text-white shadow-lg">
                                    <i class="ri-shield-check-line text-xl"></i>
                                </div>
                                <div>
                                    <div class="text-gray-900 font-bold">Quality Guaranteed</div>
                                    <div class="text-gray-600 text-sm">Premium products only</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="h-12 w-12 rounded-full bg-gradient-to-r from-green-500 to-green-600 flex items-center justify-center text-white shadow-lg">
                                    <i class="ri-truck-line text-xl"></i>
                                </div>
                                <div>
                                    <div class="text-gray-900 font-bold">Fast Delivery</div>
                                    <div class="text-gray-600 text-sm">Free shipping $100+</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Customer Stats Badge -->
                        <div class="absolute top-8 -right-8 bg-white p-6 rounded-2xl shadow-xl border border-gray-100 animate-float" style="animation-delay: 1s;">
                            <div class="flex items-center gap-4 mb-3">
                                <div class="flex -space-x-2">
                                    <img src="https://randomuser.me/api/portraits/women/79.jpg" class="w-10 h-10 rounded-full border-2 border-white shadow-md">
                                    <img src="https://randomuser.me/api/portraits/men/4.jpg" class="w-10 h-10 rounded-full border-2 border-white shadow-md">
                                    <img src="https://randomuser.me/api/portraits/women/23.jpg" class="w-10 h-10 rounded-full border-2 border-white shadow-md">
                                    <div class="w-10 h-10 rounded-full border-2 border-white bg-primary-500 text-white text-sm font-bold flex items-center justify-center shadow-md">+</div>
                                </div>
                                <div>
                                    <div class="text-lg font-bold text-gray-900">50k+</div>
                                    <div class="text-sm text-gray-500">Happy customers</div>
                                </div>
                            </div>
                            <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-primary-500 to-primary-600 rounded-full animate-pulse-slow" style="width: 85%"></div>
                            </div>
                            <div class="text-xs text-gray-500 mt-1">Customer satisfaction: 98%</div>
                        </div>

                        <!-- Live Sale Notification -->
                        <div class="absolute bottom-8 -left-8 bg-gradient-to-r from-orange-500 to-red-500 text-white p-4 rounded-2xl shadow-xl animate-bounce-slow">
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-white rounded-full animate-pulse"></div>
                                <div>
                                    <div class="font-bold text-sm">🔥 LIVE SALE</div>
                                    <div class="text-xs opacity-90">Someone just bought this!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Categories Section -->
    <div class="py-32 bg-gradient-to-b from-white to-gray-50/50" id="categories">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header with Animation -->
            <div class="mb-20 text-center" data-aos="fade-up" data-aos-duration="800">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-primary-50 border border-primary-200 text-primary-700 text-sm font-semibold mb-6">
                    <i class="ri-grid-3-line mr-2"></i>
                    EXPLORE CATEGORIES
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">
                    Discover Our <span class="text-gradient">Collections</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto font-light leading-relaxed">
                    Find exactly what you need from our carefully curated categories. 
                    <span class="font-medium text-primary-600">Premium quality</span> products across diverse categories.
                </p>
                <div class="w-32 h-1 bg-gradient-to-r from-primary-400 to-primary-600 rounded-full mx-auto mt-8"></div>
            </div>

            <!-- Categories Grid with Enhanced Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($categories as $index => $category)
                    <div class="group relative" data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ $index * 100 }}">
                        <a href="{{ route('products.all', ['category' => $category->id]) }}" 
                           class="block relative h-96 overflow-hidden rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 hover:scale-105">
                            <!-- Background Image with Overlay Effects -->










                            <div class="absolute inset-0">
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/50 to-transparent"></div>
                                <div class="absolute inset-0 bg-gradient-to-br from-primary-500/20 to-purple-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            </div>









                            
                            <!-- Content Container -->
                            <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-8">
                                <!-- Icon with Modern Animation -->
                                <div class="mb-6 h-20 w-20 rounded-full bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-white
                                            transform transition-all duration-500 group-hover:scale-125 group-hover:bg-primary-500 group-hover:border-primary-400 group-hover:rotate-12">
                                    <i class="ri-shopping-bag-3-line text-3xl"></i>
                                </div>
                                
                                <!-- Category Name -->
                                <h3 class="text-3xl font-bold text-white mb-4 transition-all duration-300 group-hover:translate-y-2 group-hover:scale-110">
                                    {{ $category->name }}
                                </h3>
                                
                                <!-- Animated Underline -->
                                <div class="w-12 h-1 bg-primary-400 rounded-full mb-6 transform transition-all duration-500 
                                            group-hover:w-32 group-hover:bg-white group-hover:shadow-lg"></div>
                                
                                <!-- CTA with Icon -->
                                <div class="inline-flex items-center text-sm font-semibold text-white opacity-0 group-hover:opacity-100 
                                            transition-all duration-500 transform translate-y-4 group-hover:translate-y-0
                                            bg-white/10 backdrop-blur-sm rounded-full px-6 py-3 border border-white/20">
                                    <span>Browse Collection</span>
                                    <i class="ri-arrow-right-line ml-2 transform group-hover:translate-x-1 transition-transform duration-300"></i>
                                </div>
                            </div>
                            
                            <!-- Floating Badge -->
                            <div class="absolute top-6 right-6 bg-gradient-to-r from-primary-500 to-primary-600 text-white text-xs font-bold px-3 py-2 rounded-full shadow-lg
                                        opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-x-4 group-hover:translate-x-0">
                                NEW
                            </div>
                            
                            <!-- Corner Decoration -->
                            <div class="absolute bottom-0 left-0 w-0 h-0 border-l-[60px] border-l-primary-500/80 border-t-[60px] border-t-transparent 
                                        opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Enhanced Latest Products Section -->
    <div class="py-32 bg-white relative overflow-hidden" id="latest-products">
        <!-- Background Decorations -->
        <div class="absolute top-20 right-10 w-32 h-32 bg-primary-100 rounded-full mix-blend-multiply filter blur-2xl opacity-70"></div>
        <div class="absolute bottom-20 left-10 w-40 h-40 bg-purple-100 rounded-full mix-blend-multiply filter blur-2xl opacity-70"></div>
        
        <div class="relative max-w-7xl mx-auto px-6">
            <!-- Section Header -->
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

            <!-- Enhanced Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($latestproducts as $index => $product)
                    <div class="group relative" data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ $index * 100 }}">
                        <div class="card-stack bg-white rounded-3xl shadow-lg overflow-hidden transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-3 hover:rotate-1">
                            <!-- Product Image Container -->
                            <div class="relative aspect-square overflow-hidden bg-gray-100">
                                <img src="{{ asset('images/products/' . $product->photopath) }}"
                                    alt="{{ $product->name }}"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                
                                <!-- Sale Badge -->
                                @if ($product->discounted_price != '')
                                    <div class="absolute top-4 left-4 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs font-bold uppercase tracking-wider px-3 py-2 rounded-full shadow-lg">
                                        SALE
                                    </div>
                                @endif
                                
                                <!-- New Badge -->
                                <div class="absolute top-4 right-4 bg-gradient-to-r from-primary-500 to-primary-600 text-white text-xs font-bold uppercase tracking-wider px-3 py-2 rounded-full shadow-lg">
                                    NEW
                                </div>
                                
                                <!-- Quick Action Overlay -->
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
                                
                                <!-- Stock Status -->
                                @if($product->stock <= 5)
                                    <div class="absolute bottom-4 left-4 bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                        Only {{ $product->stock }} left!
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Product Details -->
                            <div class="p-6">
                                <!-- Category Badge -->
                                <div class="inline-flex items-center px-2 py-1 rounded-full bg-primary-50 text-primary-600 text-xs font-medium mb-3">
                                    {{ $product->category->name ?? 'General' }}
                                </div>
                                
                                <a href="{{ route('viewproduct', $product->id) }}">
                                    <h3 class="font-bold text-gray-900 group-hover:text-primary-600 transition-colors text-lg line-clamp-2 mb-3 leading-tight">
                                        {{ $product->name }}
                                    </h3>
                                </a>
                                
                                <!-- Rating Stars -->
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
                                
                                <!-- Price Section -->
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center space-x-2">
                                        @if ($product->discounted_price != '')
                                            <span class="text-2xl font-black text-gray-900">${{ $product->discounted_price }}</span>
                                            <span class="text-sm text-gray-400 line-through">${{ $product->price }}</span>
                                        @else
                                            <span class="text-2xl font-black text-gray-900">${{ $product->price }}</span>
                                        @endif
                                    </div>
                                    @if ($product->discounted_price != '')
                                        <span class="text-xs font-bold text-white bg-gradient-to-r from-red-500 to-pink-500 px-2 py-1 rounded-full">
                                            {{ number_format((($product->price - $product->discounted_price) / $product->price) * 100) }}% OFF
                                        </span>
                                    @endif
                                </div>
                                
                                <!-- Action Button -->
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
            
            <!-- Enhanced View All Link -->
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

    <!-- Features Section with Visual Elements -->
    <div class="py-24 bg-white relative overflow-hidden">
        <!-- Background Elements -->
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
            
            <!-- Call to Action -->
            <div class="mt-20 text-center">
                <a href="/about" class="btn-primary inline-block px-8 py-4">
                    Learn More About Our Services
                </a>
            </div>
        </div>
    </div>
    
    <!-- Testimonials Section -->
    <div class="py-24 bg-gray-50 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-32 h-64 bg-teal-500/10 rounded-r-full"></div>
        <div class="absolute right-0 top-1/4 w-32 h-64 bg-teal-500/10 rounded-l-full"></div>
        
        <div class="relative max-w-7xl mx-auto px-6">
            <div class="mb-16 text-center">
                <h2 class="text-sm font-semibold tracking-wider text-teal-500 uppercase">TESTIMONIALS</h2>
                <p class="mt-2 text-3xl font-bold text-gray-900 sm:text-4xl">What Our Customers Say</p>
                <p class="mt-4 text-lg text-gray-500 max-w-xl mx-auto">Discover why thousands of customers trust us for their shopping needs.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl transition-all hover-lift">
                    <div class="flex text-teal-500 mb-6">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                    </div>
                    <p class="text-gray-600 mb-8">"The quality of products I received exceeded my expectations. The delivery was prompt, and customer service was exceptional. I'm now a loyal customer!"</p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Customer" class="w-12 h-12 rounded-full border-2 border-teal-100">
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Sarah Johnson</h4>
                            <p class="text-sm text-gray-500">Loyal Customer</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl transition-all hover-lift md:translate-y-4">
                    <div class="flex text-teal-500 mb-6">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                    </div>
                    <p class="text-gray-600 mb-8">"I've been shopping here for years and have never been disappointed. The website is easy to navigate, and returns are hassle-free. Simply the best online store!"</p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Customer" class="w-12 h-12 rounded-full border-2 border-teal-100">
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">David Miller</h4>
                            <p class="text-sm text-gray-500">Repeat Customer</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-xl transition-all hover-lift">
                    <div class="flex text-teal-500 mb-6">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                    </div>
                    <p class="text-gray-600 mb-8">"Found exactly what I was looking for at a great price. The shipping was lightning fast, and everything arrived in perfect condition. Will definitely shop here again!"</p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Customer" class="w-12 h-12 rounded-full border-2 border-teal-100">
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-900">Emma Thompson</h4>
                            <p class="text-sm text-gray-500">New Customer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Newsletter & CTA -->
    <div class="py-20 relative overflow-hidden">
        <!-- Background Gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-teal-500 to-teal-600 skew-y-3 transform -translate-y-36"></div>
        
        <!-- Content -->
        <div class="relative max-w-7xl mx-auto px-6 py-10">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                <div class="grid md:grid-cols-2">
                    <!-- Left Side: Image -->
                    <div class="relative h-full hidden md:block">
                        <img src="https://images.unsplash.com/photo-1607083206968-13611e3d76db?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" 
                             alt="Newsletter" 
                             class="absolute inset-0 h-full w-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-r from-teal-500/90 to-teal-600/80 mix-blend-multiply"></div>
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-white p-12">
                            <div class="text-center">
                                <i class="ri-mail-send-line text-5xl mb-4"></i>
                                <h3 class="text-2xl font-bold mb-3">Stay Connected</h3>
                                <p class="text-white/80">Join our community and be the first to know about new products, exclusive offers, and shopping tips.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Side: Form -->
                    <div class="p-10 md:p-12 bg-white">
                        <div class="text-center md:text-left">
                            <h2 class="text-3xl font-bold text-gray-900 mb-4">Subscribe to Our Newsletter</h2>
                            <p class="text-gray-600 mb-8">Get the latest updates, deals, and exclusive offers directly to your inbox.</p>
                        </div>
                        
                        <form class="space-y-4">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                <input type="email" id="email" placeholder="Enter your email" required
                                       class="w-full px-4 py-3 rounded-full border border-gray-300 focus:ring-2 focus:ring-teal-300 focus:border-teal-300">
                            </div>
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                <input type="text" id="name" placeholder="Enter your name" 
                                       class="w-full px-4 py-3 rounded-full border border-gray-300 focus:ring-2 focus:ring-teal-300 focus:border-teal-300">
                            </div>
                            <div class="flex items-start">
                                <input type="checkbox" id="privacy" class="mt-1 h-4 w-4 text-teal-500 border-gray-300 rounded focus:ring-teal-300">
                                <label for="privacy" class="ml-2 text-sm text-gray-600">
                                    I agree to receive promotional emails and accept the <a href="#" class="text-teal-600 hover:underline">Privacy Policy</a>
                                </label>
                            </div>
                            <button type="submit" class="w-full btn-primary py-3">
                                Subscribe Now
                            </button>
                        </form>
                        
                        <div class="mt-6 text-center text-sm text-gray-500">
                            You can unsubscribe at any time. No spam, we promise!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle wishlist function
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
                        // Remove from wishlist
                        icon.className = 'ri-heart-line text-lg';
                    } else {
                        // Add to wishlist
                        icon.className = 'ri-heart-fill text-lg text-red-500';
                    }
                    
                    // Update wishlist count in navigation if it exists
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