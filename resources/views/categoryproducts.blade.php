@extends('layouts.master')
@section('title', $category->name)
@section('content')
    <!-- Enhanced Category Header with Background -->
    <div class="relative overflow-hidden bg-gradient-to-br from-primary-50 via-white to-gray-50/50 py-20">
        <!-- Background Decorations -->
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-gradient-to-br from-purple-100 to-pink-100 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <!-- Badge -->
            <div class="inline-flex items-center px-4 py-2 rounded-full bg-primary-50 border border-primary-200 text-primary-700 text-sm font-semibold mb-6" data-aos="fade-up">
                <i class="ri-grid-3-line mr-2"></i>
                CATEGORY COLLECTION
            </div>
            
            <!-- Main Title -->
            <h1 class="text-4xl md:text-6xl font-black text-gray-900 mb-6" data-aos="fade-up" data-aos-delay="100">
                {{ $category->name }}
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto font-light leading-relaxed mb-8" data-aos="fade-up" data-aos-delay="200">
                Explore our curated collection of <span class="font-medium text-primary-600">{{ $category->name }}</span> products designed for quality and satisfaction.
            </p>
            
            <!-- Breadcrumb with Enhanced Design -->
            <nav class="flex justify-center items-center text-sm" data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-center space-x-2 bg-white/80 backdrop-blur-sm rounded-full px-6 py-3 shadow-lg border border-gray-200">
                    <a href="/" class="text-gray-500 hover:text-primary-600 transition-colors duration-200 flex items-center">
                        <i class="ri-home-4-line mr-1"></i>
                        Home
                    </a>
                    <i class="ri-arrow-right-s-line text-gray-400"></i>
                    <span class="text-primary-600 font-semibold">{{ $category->name }}</span>
                </div>
            </nav>
        </div>
    </div>
    
    <!-- Enhanced Products Section -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse ($products as $index => $product)
                    <div class="group relative" data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ $index * 100 }}">
                        <div class="card-stack bg-white rounded-3xl shadow-lg overflow-hidden transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-3 hover:rotate-1">
                            <!-- Product Image Container -->
                            <div class="relative aspect-square overflow-hidden bg-gray-100">
                                <img src="{{ asset('images/products/' . $product->photopath) }}"
                                    alt="{{ $product->name }}"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                
                                <!-- Sale Badge with Animation -->
                                @if ($product->discounted_price != '')
                                    <div class="absolute top-4 left-4 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs font-bold uppercase tracking-wider px-3 py-2 rounded-full shadow-lg animate-bounce-slow">
                                        <i class="ri-fire-line mr-1"></i>SALE
                                    </div>
                                @endif
                                
                                <!-- New Badge -->
                                <div class="absolute top-4 right-4 bg-gradient-to-r from-primary-500 to-primary-600 text-white text-xs font-bold uppercase tracking-wider px-3 py-2 rounded-full shadow-lg">
                                    {{ $category->name }}
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
                                        <button class="w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center text-gray-700 hover:bg-red-500 hover:text-white transition-all duration-300 transform hover:scale-110 shadow-lg">
                                            <i class="ri-heart-line text-lg"></i>
                                        </button>
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
                                <a href="{{ route('viewproduct', $product->id) }}">
                                    <h3 class="font-bold text-gray-900 group-hover:text-primary-600 transition-colors text-lg line-clamp-2 mb-3 leading-tight">
                                        {{ $product->name }}
                                    </h3>
                                </a>
                                
                                <!-- Rating Stars -->
                                <div class="flex items-center mb-4">
                                    <div class="flex text-yellow-400 mr-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="ri-star-fill text-sm"></i>
                                        @endfor
                                    </div>
                                    <span class="text-xs text-gray-500 font-medium">(4.8) 127 reviews</span>
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
                @empty
                    <!-- Enhanced Empty State -->
                    <div class="col-span-full py-20 text-center" data-aos="fade-up">
                        <div class="max-w-md mx-auto">
                            <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gradient-to-br from-primary-50 to-primary-100 mb-8">
                                <i class="ri-shopping-basket-2-line text-4xl text-primary-500"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">No Products Found</h3>
                            <p class="text-gray-600 mb-8 leading-relaxed">We couldn't find any products in the <span class="font-medium text-primary-600">{{ $category->name }}</span> category yet. Check back soon for new arrivals!</p>
                            <a href="/" class="btn-primary inline-flex items-center px-8 py-3">
                                <i class="ri-arrow-left-line mr-2"></i>
                                Continue Shopping
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection