{--
    =====================================================
    VybeCart - Search Results
    =====================================================
    Description: Product search results display
    Author: VybeCart Team
    Last Modified: 2025-12-28
    =====================================================
--}
{{--
    =====================================================
    VybeCart - Search Results
    =====================================================
    Description: Product search results display
    Features: Search filtering, product grid
    Author: VybeCart Team
    =====================================================
--}}

@extends('layouts.master')
@section('title', 'Search Results')
@section('content')
    <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 via-white to-primary-50/30 py-16">
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-gradient-to-br from-purple-100 to-pink-100 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-16 text-center" data-aos="fade-up">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-primary-50 border border-primary-200 text-primary-700 text-sm font-semibold mb-6">
                    <i class="ri-search-2-line mr-2"></i>
                    SEARCH RESULTS
                </div>
                <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">
                    Search Results for <span class="text-gradient">"{{request('search')}}"</span>
                </h1>
                <div class="flex items-center justify-center space-x-4 text-lg text-gray-600">
                    <div class="flex items-center">
                        <i class="ri-checkbox-circle-line text-primary-500 mr-2"></i>
                        <span class="font-medium text-primary-600">{{ $products->count() }}</span> products found
                    </div>
                    @if($products->count() > 0)
                        <div class="w-px h-6 bg-gray-300"></div>
                        <div class="flex items-center">
                            <i class="ri-time-line text-gray-400 mr-2"></i>
                            <span>Updated just now</span>
                        </div>
                    @endif
                </div>
            </div>
            
            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($products as $index => $product)
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
                                        {{ $product->category->name ?? 'General' }}
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
                                            <button class="w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center text-gray-700 hover:bg-red-500 hover:text-white transition-all duration-300 transform hover:scale-110 shadow-lg">
                                                <i class="ri-heart-line text-lg"></i>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    @if($product->stock <= 5)
                                        <div class="absolute bottom-4 left-4 bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                            Only {{ $product->stock }} left!
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="p-6">
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
                                                    <i class="ri-star-line text-sm"></i>
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
                
                <div class="mt-16 text-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="inline-flex items-center px-8 py-4 bg-white rounded-2xl shadow-lg border border-gray-200">
                        <div class="flex items-center space-x-6">
                            <div class="flex items-center">
                                <i class="ri-search-line text-primary-500 mr-2"></i>
                                <span class="text-sm text-gray-600">Search term:</span>
                                <span class="ml-1 font-bold text-primary-600">"{{request('search')}}"</span>
                            </div>
                            <div class="w-px h-6 bg-gray-300"></div>
                            <div class="flex items-center">
                                <i class="ri-shopping-bag-line text-primary-500 mr-2"></i>
                                <span class="text-sm text-gray-600">Results:</span>
                                <span class="ml-1 font-bold text-primary-600">{{ $products->count() }} products</span>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="py-20 text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="max-w-md mx-auto">
                        <div class="inline-flex items-center justify-center w-32 h-32 rounded-full bg-gradient-to-br from-gray-100 to-gray-200 mb-8">
                            <i class="ri-search-line text-6xl text-gray-400"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">No Products Found</h3>
                        <p class="text-gray-600 mb-8 leading-relaxed">
                            We couldn't find any products matching <span class="font-medium text-primary-600">"{{request('search')}}"</span>. 
                            Try adjusting your search terms or browse our categories.
                        </p>

                        
                        <div class="bg-gray-50 rounded-2xl p-6 mb-8">
                            <h4 class="font-bold text-gray-900 mb-4">Try searching for:</h4>
                            <div class="flex flex-wrap gap-2 justify-center">
                                @php
                                    $categories = \App\Models\Category::orderBy('name', 'asc')->get();
                                @endphp
                                @foreach($categories as $category)
                                    <a href="{{ route('categoryproducts', $category->id) }}" class="px-3 py-1 bg-white rounded-full text-sm text-gray-600 border border-gray-200 hover:bg-primary-50 hover:text-primary-600 hover:border-primary-200 transition-all duration-300">
                                        {{ $category->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>


                        
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="/" class="btn-primary inline-flex items-center px-8 py-3">
                                <i class="ri-home-4-line mr-2"></i>
                                Back to Home
                            </a>
                            <button onclick="document.querySelector('input[name=search]').focus()" class="btn-secondary inline-flex items-center px-8 py-3">
                                <i class="ri-search-2-line mr-2"></i>
                                Try New Search
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection