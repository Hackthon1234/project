@extends('layouts.master')
@section('title', 'All Products')
@section('content')
    <!-- Enhanced Products Header -->
    <div class="relative overflow-hidden bg-gradient-to-br from-primary-50 via-white to-blue-50/30 py-20">
        <!-- Background Decorations -->
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-gradient-to-br from-primary-100 to-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-gradient-to-br from-purple-100 to-primary-100 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <!-- Badge -->
            <div class="inline-flex items-center px-4 py-2 rounded-full bg-primary-50 border border-primary-200 text-primary-700 text-sm font-semibold mb-6" data-aos="fade-up">
                <i class="ri-store-2-line mr-2"></i>
                PRODUCT CATALOG
            </div>
            
            <!-- Main Title -->
            <h1 class="text-4xl md:text-6xl font-black text-gray-900 mb-6" data-aos="fade-up" data-aos-delay="100">
                All Products
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto font-light leading-relaxed mb-8" data-aos="fade-up" data-aos-delay="200">
                Discover our complete collection of premium products across all categories.
            </p>
            
            <!-- Breadcrumb -->
            <nav class="flex justify-center items-center text-sm" data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-center space-x-2 bg-white/80 backdrop-blur-sm rounded-full px-6 py-3 shadow-lg border border-gray-200">
                    <a href="/" class="text-gray-500 hover:text-primary-600 transition-colors duration-200 flex items-center">
                        <i class="ri-home-4-line mr-1"></i>
                        Home
                    </a>
                    <i class="ri-arrow-right-s-line text-gray-400"></i>
                    <span class="text-primary-600 font-semibold">All Products</span>
                </div>
            </nav>
        </div>
    </div>

    <!-- Filters and Products Section -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Filters Bar -->
            <div class="mb-12" data-aos="fade-up">
                <div class="bg-gray-50 rounded-3xl p-6 shadow-lg border border-gray-200">
                    <form method="GET" action="{{ route('products.all') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <!-- Search -->
                        <div class="relative">
                            <input type="text" name="search" value="{{ request('search') }}" 
                                   placeholder="Search products..."
                                   class="w-full pl-10 pr-4 py-3 rounded-2xl border-2 border-gray-200 focus:border-primary-300 focus:ring-4 focus:ring-primary-100 focus:outline-none transition-all duration-300">
                            <i class="ri-search-line absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        
                        <!-- Category Filter -->
                        <div class="relative">
                            <select name="category" class="w-full px-4 py-3 rounded-2xl border-2 border-gray-200 focus:border-primary-300 focus:ring-4 focus:ring-primary-100 focus:outline-none transition-all duration-300 appearance-none bg-white">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <i class="ri-arrow-down-s-line absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                        </div>
                        
                        <!-- Sort Options -->
                        <div class="relative">
                            <select name="sort" class="w-full px-4 py-3 rounded-2xl border-2 border-gray-200 focus:border-primary-300 focus:ring-4 focus:ring-primary-100 focus:outline-none transition-all duration-300 appearance-none bg-white">
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name A-Z</option>
                                <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Highest Rated</option>
                            </select>
                            <i class="ri-arrow-down-s-line absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                        </div>
                        
                        <!-- Apply Filters Button -->
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-primary-500 to-primary-600 text-white rounded-2xl font-semibold hover:from-primary-600 hover:to-primary-700 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                            <i class="ri-filter-line mr-2"></i>
                            Apply Filters
                        </button>
                    </form>
                </div>
            </div>

            <!-- Products Count -->
            <div class="flex justify-between items-center mb-8" data-aos="fade-up">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">
                        {{ $products->count() }} Products Found
                    </h2>
                    <p class="text-gray-600 mt-1">
                        Showing {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} of {{ $products->total() }} results
                    </p>
                </div>
                
                <!-- Quick Actions -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('products.all') }}" class="px-4 py-2 text-primary-600 hover:text-primary-700 font-medium transition-colors duration-200">
                        <i class="ri-refresh-line mr-1"></i>
                        Clear Filters
                    </a>
                </div>
            </div>

            @if($products->count() > 0)
                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mb-12">
                    @foreach ($products as $index => $product)
                        <div class="group relative" data-aos="fade-up" data-aos-duration="600" data-aos-delay="{{ $index * 50 }}">
                            <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                                <!-- Product Image Container -->
                                <div class="relative aspect-square overflow-hidden bg-gray-100">
                                    <img src="{{ asset('images/products/' . $product->photopath) }}"
                                        alt="{{ $product->name }}"
                                        class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300">
                                    
                                    <!-- Sale Badge -->
                                    @if ($product->discounted_price != '')
                                        <div class="absolute top-3 left-3 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                            SALE
                                        </div>
                                    @endif
                                    
                                    <!-- Quick View Overlay -->
                                    <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center">
                                        <a href="{{ route('viewproduct', $product->id) }}" 
                                           class="px-6 py-3 bg-white text-gray-900 rounded-lg font-semibold hover:bg-primary-500 hover:text-white transition-all duration-300 transform hover:scale-105 shadow-lg">
                                            <i class="ri-eye-line mr-2"></i>
                                            Quick View
                                        </a>
                                    </div>
                                    
                                    <!-- Stock Status -->
                                    @if($product->stock <= 5 && $product->stock > 0)
                                        <div class="absolute bottom-3 left-3 bg-orange-500 text-white text-xs font-medium px-2 py-1 rounded">
                                            Only {{ $product->stock }} left!
                                        </div>
                                    @elseif($product->stock <= 0)
                                        <div class="absolute bottom-3 left-3 bg-red-500 text-white text-xs font-medium px-2 py-1 rounded">
                                            Out of Stock
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Product Details -->
                                <div class="p-4">
                                    <!-- Category Badge -->
                                    <div class="inline-flex items-center px-2 py-1 rounded bg-primary-50 text-primary-600 text-xs font-medium mb-2">
                                        {{ $product->category->name ?? 'General' }}
                                    </div>
                                    
                                    <a href="{{ route('viewproduct', $product->id) }}">
                                        <h3 class="font-semibold text-gray-900 group-hover:text-primary-600 transition-colors text-base line-clamp-2 mb-2 leading-tight">
                                            {{ $product->name }}
                                        </h3>
                                    </a>
                                    
                                    <!-- Rating Stars -->
                                    <div class="flex items-center mb-3">
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
                                            <span class="text-xs text-gray-500">({{ $product->totalReviews() }})</span>
                                        @endif
                                    </div>
                                    
                                    <!-- Price Section -->
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center space-x-2">
                                            @if ($product->discounted_price != '')
                                                <span class="text-xl font-bold text-gray-900">${{ $product->discounted_price }}</span>
                                                <span class="text-sm text-gray-400 line-through">${{ $product->price }}</span>
                                            @else
                                                <span class="text-xl font-bold text-gray-900">${{ $product->price }}</span>
                                            @endif
                                        </div>
                                        @if ($product->discounted_price != '')
                                            <span class="text-xs font-bold text-red-600 bg-red-50 px-2 py-1 rounded">
                                                {{ number_format((($product->price - $product->discounted_price) / $product->price) * 100) }}% OFF
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <!-- Action Buttons -->
                                    <div class="flex space-x-3">
                                        <a href="{{ route('viewproduct', $product->id) }}"
                                           class="flex-1 text-center py-2.5 px-4 rounded-lg border border-gray-200 text-gray-700 font-medium 
                                                hover:bg-primary-500 hover:text-white hover:border-primary-500 
                                                transition-all duration-200">
                                            View Details
                                        </a>
                                        @auth
                                            <form action="{{ route('cart.store') }}" method="POST" class="inline">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" 
                                                        class="w-10 h-10 border border-gray-200 text-gray-600 rounded-lg hover:bg-primary-500 hover:text-white hover:border-primary-500 transition-all duration-200">
                                                    <i class="ri-shopping-cart-2-line"></i>
                                                </button>
                                            </form>
                                            <button onclick="toggleWishlist({{ $product->id }}, this)"
                                                    class="w-10 h-10 border border-gray-200 text-gray-600 rounded-lg hover:bg-red-500 hover:text-white hover:border-red-500 transition-all duration-200 wishlist-btn"
                                                    data-product-id="{{ $product->id }}">
                                                @if(auth()->user()->wishlists->contains('product_id', $product->id))
                                                    <i class="ri-heart-fill text-red-500"></i>
                                                @else
                                                    <i class="ri-heart-line"></i>
                                                @endif
                                            </button>
                                        @else
                                            <a href="{{ route('login') }}" 
                                               class="w-10 h-10 border border-gray-200 text-gray-600 rounded-lg hover:bg-red-500 hover:text-white hover:border-red-500 transition-all duration-200 flex items-center justify-center">
                                                <i class="ri-heart-line"></i>
                                            </a>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Enhanced Pagination -->
                <div class="flex justify-center" data-aos="fade-up">
                    <div class="bg-white rounded-2xl p-4 shadow-lg border border-gray-200">
                        {{ $products->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-20" data-aos="fade-up">
                    <div class="max-w-md mx-auto">
                        <div class="inline-flex items-center justify-center w-32 h-32 rounded-full bg-gradient-to-br from-gray-50 to-gray-100 mb-8">
                            <i class="ri-shopping-basket-2-line text-6xl text-gray-400"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">No Products Found</h3>
                        <p class="text-gray-600 mb-8 leading-relaxed">We couldn't find any products matching your criteria. Try adjusting your filters or search terms.</p>
                        <a href="{{ route('products.all') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-primary-500 to-primary-600 text-white rounded-2xl font-bold hover:from-primary-600 hover:to-primary-700 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                            <i class="ri-refresh-line mr-2"></i>
                            View All Products
                        </a>
                    </div>
                </div>
            @endif
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
                        icon.className = 'ri-heart-line';
                        button.classList.remove('text-red-500');
                    } else {
                        // Add to wishlist
                        icon.className = 'ri-heart-fill text-red-500';
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
