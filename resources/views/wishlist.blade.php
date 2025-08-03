@extends('layouts.master')
@section('title', 'My Wishlist')
@section('content')
    <!-- Enhanced Wishlist Header -->
    <div class="relative overflow-hidden bg-gradient-to-br from-pink-50 via-white to-red-50/30 py-20">
        <!-- Background Decorations -->
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-gradient-to-br from-pink-100 to-red-200 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-gradient-to-br from-purple-100 to-pink-100 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <!-- Badge -->
            <div class="inline-flex items-center px-4 py-2 rounded-full bg-pink-50 border border-pink-200 text-pink-700 text-sm font-semibold mb-6" data-aos="fade-up">
                <i class="ri-heart-3-line mr-2"></i>
                MY FAVORITES
            </div>
            
            <!-- Main Title -->
            <h1 class="text-4xl md:text-6xl font-black text-gray-900 mb-6" data-aos="fade-up" data-aos-delay="100">
                My Wishlist
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto font-light leading-relaxed mb-8" data-aos="fade-up" data-aos-delay="200">
                Keep track of your favorite products and never lose sight of what you love most.
            </p>
            
            <!-- Breadcrumb -->
            <nav class="flex justify-center items-center text-sm" data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-center space-x-2 bg-white/80 backdrop-blur-sm rounded-full px-6 py-3 shadow-lg border border-gray-200">
                    <a href="/" class="text-gray-500 hover:text-primary-600 transition-colors duration-200 flex items-center">
                        <i class="ri-home-4-line mr-1"></i>
                        Home
                    </a>
                    <i class="ri-arrow-right-s-line text-gray-400"></i>
                    <span class="text-primary-600 font-semibold">Wishlist</span>
                </div>
            </nav>
        </div>
    </div>

    <!-- Wishlist Content -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($wishlists->count() > 0)
                <!-- Wishlist Stats -->
                <div class="mb-12 text-center" data-aos="fade-up">
                    <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-pink-50 to-red-50 rounded-full">
                        <i class="ri-heart-3-fill text-pink-500 mr-2"></i>
                        <span class="text-gray-700 font-semibold">{{ $wishlists->count() }} {{ Str::plural('item', $wishlists->count()) }} in your wishlist</span>
                    </div>
                </div>

                <!-- Wishlist Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($wishlists as $index => $wishlist)
                        <div class="group relative" data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ $index * 100 }}">
                            <div class="bg-white rounded-3xl shadow-lg overflow-hidden transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-3">
                                <!-- Product Image Container -->
                                <div class="relative aspect-square overflow-hidden bg-gray-100">
                                    <img src="{{ asset('images/products/' . $wishlist->product->photopath) }}"
                                        alt="{{ $wishlist->product->name }}"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                    
                                    <!-- Remove from Wishlist Button -->
                                    <button onclick="removeFromWishlist({{ $wishlist->product->id }})" 
                                            class="absolute top-4 right-4 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition-all duration-300 transform hover:scale-110 shadow-lg">
                                        <i class="ri-heart-fill text-lg"></i>
                                    </button>
                                    
                                    <!-- Sale Badge -->
                                    @if ($wishlist->product->discounted_price != '')
                                        <div class="absolute top-4 left-4 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs font-bold uppercase tracking-wider px-3 py-2 rounded-full shadow-lg">
                                            <i class="ri-fire-line mr-1"></i>SALE
                                        </div>
                                    @endif
                                    
                                    <!-- Quick Action Overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center">
                                        <div class="flex items-center gap-3 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                            <a href="{{ route('viewproduct', $wishlist->product->id) }}" 
                                               class="w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center text-gray-700 hover:bg-primary-500 hover:text-white transition-all duration-300 transform hover:scale-110 shadow-lg">
                                                <i class="ri-eye-line text-lg"></i>
                                            </a>
                                            @auth
                                                <form action="{{ route('cart.store') }}" method="POST" class="inline">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $wishlist->product->id }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <button type="submit" class="w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center text-gray-700 hover:bg-primary-500 hover:text-white transition-all duration-300 transform hover:scale-110 shadow-lg">
                                                        <i class="ri-shopping-cart-2-line text-lg"></i>
                                                    </button>
                                                </form>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Product Details -->
                                <div class="p-6">
                                    <!-- Category Badge -->
                                    <div class="inline-flex items-center px-2 py-1 rounded-full bg-primary-50 text-primary-600 text-xs font-medium mb-3">
                                        {{ $wishlist->product->category->name ?? 'General' }}
                                    </div>
                                    
                                    <a href="{{ route('viewproduct', $wishlist->product->id) }}">
                                        <h3 class="font-bold text-gray-900 group-hover:text-primary-600 transition-colors text-lg line-clamp-2 mb-3 leading-tight">
                                            {{ $wishlist->product->name }}
                                        </h3>
                                    </a>
                                    
                                    <!-- Rating Stars -->
                                    <div class="flex items-center mb-4">
                                        <div class="flex text-yellow-400 mr-2">
                                            @php $avgRating = $wishlist->product->averageRating(); @endphp
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
                                        @if($wishlist->product->totalReviews() > 0)
                                            <span class="text-xs text-gray-500 font-medium">({{ number_format($avgRating, 1) }}) {{ $wishlist->product->totalReviews() }} reviews</span>
                                        @else
                                            <span class="text-xs text-gray-500 font-medium">No reviews yet</span>
                                        @endif
                                    </div>
                                    
                                    <!-- Price Section -->
                                    <div class="flex items-center justify-between mb-6">
                                        <div class="flex items-center space-x-2">
                                            @if ($wishlist->product->discounted_price != '')
                                                <span class="text-2xl font-black text-gray-900">${{ $wishlist->product->discounted_price }}</span>
                                                <span class="text-sm text-gray-400 line-through">${{ $wishlist->product->price }}</span>
                                            @else
                                                <span class="text-2xl font-black text-gray-900">${{ $wishlist->product->price }}</span>
                                            @endif
                                        </div>
                                        @if ($wishlist->product->discounted_price != '')
                                            <span class="text-xs font-bold text-white bg-gradient-to-r from-red-500 to-pink-500 px-2 py-1 rounded-full">
                                                {{ number_format((($wishlist->product->price - $wishlist->product->discounted_price) / $wishlist->product->price) * 100) }}% OFF
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <!-- Action Buttons -->
                                    <div class="flex space-x-3">
                                        <a href="{{ route('viewproduct', $wishlist->product->id) }}"
                                           class="flex-1 text-center py-3 px-4 rounded-2xl border-2 border-gray-200 text-gray-700 font-semibold 
                                                hover:bg-gradient-to-r hover:from-primary-500 hover:to-primary-600 hover:text-white hover:border-transparent 
                                                transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg">
                                            View Details
                                        </a>
                                        <button onclick="removeFromWishlist({{ $wishlist->product->id }})"
                                                class="w-12 h-12 border-2 border-red-200 text-red-500 rounded-2xl hover:bg-red-500 hover:text-white hover:border-red-500 transition-all duration-300 transform hover:-translate-y-0.5">
                                            <i class="ri-heart-fill"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Clear All Wishlist -->
                <div class="mt-16 text-center" data-aos="fade-up">
                    <button onclick="clearAllWishlist()" 
                            class="inline-flex items-center px-6 py-3 bg-red-500 text-white rounded-xl font-semibold hover:bg-red-600 transition-colors duration-200">
                        <i class="ri-delete-bin-line mr-2"></i>
                        Clear All Wishlist
                    </button>
                </div>
            @else
                <!-- Empty Wishlist State -->
                <div class="text-center py-20" data-aos="fade-up">
                    <div class="max-w-md mx-auto">
                        <div class="inline-flex items-center justify-center w-32 h-32 rounded-full bg-gradient-to-br from-pink-50 to-red-100 mb-8">
                            <i class="ri-heart-line text-6xl text-pink-400"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Your Wishlist is Empty</h3>
                        <p class="text-gray-600 mb-8 leading-relaxed">Start adding products you love to your wishlist and keep track of your favorites!</p>
                        <a href="/" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-primary-500 to-primary-600 text-white rounded-2xl font-bold hover:from-primary-600 hover:to-primary-700 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                            <i class="ri-shopping-bag-line mr-2"></i>
                            Start Shopping
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        // Remove from wishlist
        function removeFromWishlist(productId) {
            if (confirm('Are you sure you want to remove this item from your wishlist?')) {
                fetch(`/wishlist/${productId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload(); // Reload page to show updated wishlist
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while removing the item.');
                });
            }
        }

        // Clear all wishlist
        function clearAllWishlist() {
            if (confirm('Are you sure you want to clear your entire wishlist? This action cannot be undone.')) {
                @foreach($wishlists as $wishlist)
                    fetch(`/wishlist/{{ $wishlist->product->id }}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                        }
                    });
                @endforeach
                
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }
        }
    </script>
@endsection
