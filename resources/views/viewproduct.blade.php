@extends('layouts.master')
@section('title', $product->name)
@section('content')
    <!-- Enhanced Product View Page -->
    <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 via-white to-primary-50/30 py-8">
        <!-- Background Decorations -->
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        <div        function resetModal() {
            document.getElementById('reviewForm').reset();
            document.getElementById('reviewForm').action = '/reviews';
            document.getElementById('reviewId').value = '';
            document.getElementById('selectedRating').value = '';
            document.getElementById('reviewText').value = '';
            document.getElementById('reviewModalTitle').textContent = 'Write a Review';
            document.getElementById('submitButtonText').textContent = 'Submit Review';
            document.getElementById('reviewMethod').value = 'POST';
            currentRating = 0;
            isEditing = false;
            editingReviewId = null;
            updateStarDisplay();
        }te -bottom-20 -left-20 w-64 h-64 bg-gradient-to-br from-purple-100 to-pink-100 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Enhanced Back Navigation -->
            <div class="mb-8" data-aos="fade-up">
                <a href="{{ route('categoryproducts', $product->category->id) }}" 
                   class="group inline-flex items-center px-4 py-2 bg-white/80 backdrop-blur-sm rounded-full text-gray-700 hover:text-primary-600 transition-all duration-200 shadow-md hover:shadow-lg border border-gray-200">
                    <i class="ri-arrow-left-line mr-2 transform group-hover:-translate-x-1 transition-transform duration-200"></i> 
                    Back to {{ $product->category->name }}
                </a>
            </div>
            
            <!-- Enhanced Product Container -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100" data-aos="fade-up" data-aos-delay="100">
                <div class="grid lg:grid-cols-2 gap-0">
                    <!-- Enhanced Product Image Section -->
                    <div class="relative bg-gradient-to-br from-gray-50 to-gray-100 p-8">
                        <div class="relative aspect-square overflow-hidden rounded-2xl bg-white shadow-lg group">
                            <img src="{{ asset('images/products/' . $product->photopath) }}" 
                                 alt="{{ $product->name }}"
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                            
                            <!-- Enhanced Sale Badge -->
                            @if ($product->discounted_price != '')
                                <div class="absolute top-6 right-6 bg-gradient-to-r from-red-500 to-pink-500 text-white text-sm font-bold uppercase tracking-wider px-4 py-2 rounded-full shadow-lg animate-pulse">
                                    <i class="ri-fire-line mr-1"></i>SALE
                                </div>
                            @endif
                            
                            <!-- New Badge -->
                            <div class="absolute top-6 left-6 bg-gradient-to-r from-primary-500 to-primary-600 text-white text-xs font-bold uppercase tracking-wider px-3 py-2 rounded-full shadow-lg">
                                NEW
                            </div>
                            
                            <!-- Stock Status -->
                            @if($product->stock <= 5)
                                <div class="absolute bottom-6 left-6 bg-orange-500 text-white text-sm font-bold px-3 py-2 rounded-full">
                                    Only {{ $product->stock }} left!
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Enhanced Product Details Section -->
                    <div class="p-8 lg:p-12 space-y-8">
                        <!-- Product Title & Category -->
                        <div>
                            <div class="inline-flex items-center px-3 py-1 rounded-full bg-primary-50 text-primary-600 text-sm font-medium mb-4">
                                {{ $product->category->name }}
                            </div>
                            <h1 class="text-3xl lg:text-4xl font-black text-gray-900 mb-4 leading-tight">{{ $product->name }}</h1>
                            
                            <!-- Enhanced Price Display -->
                            <div class="flex items-center space-x-4 mb-6">
                                @if ($product->discounted_price != '')
                                    <span class="text-4xl font-black text-gray-900">${{ $product->discounted_price }}</span>
                                    <span class="text-xl text-gray-400 line-through">${{ $product->price }}</span>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-gradient-to-r from-red-500 to-pink-500 text-white text-sm font-bold">
                                        {{ number_format((($product->price - $product->discounted_price) / $product->price) * 100) }}% OFF
                                    </span>
                                @else
                                    <span class="text-4xl font-black text-gray-900">${{ $product->price }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Enhanced Description -->
                        <div class="border-t border-gray-200 pt-8">
                            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                                <i class="ri-file-text-line mr-2 text-primary-500"></i>
                                Product Description
                            </h3>
                            <p class="text-gray-600 leading-relaxed text-lg">{{ $product->description }}</p>
                        </div>
                        
                        <!-- Enhanced Product Info Grid -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-gradient-to-br from-primary-50 to-primary-100 p-4 rounded-2xl border border-primary-200">
                                <div class="flex items-center mb-2">
                                    <i class="ri-stack-line text-primary-600 mr-2"></i>
                                    <span class="text-sm text-primary-700 font-medium">Stock Available</span>
                                </div>
                                <p class="text-2xl font-black text-primary-900">{{ $product->stock }}</p>
                            </div>
                            
                            <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-4 rounded-2xl border border-gray-200">
                                <div class="flex items-center mb-2">
                                    <i class="ri-calendar-line text-gray-600 mr-2"></i>
                                    <span class="text-sm text-gray-700 font-medium">Added On</span>
                                </div>
                                <p class="text-lg font-bold text-gray-900">{{ $product->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                        
                        <!-- Enhanced Add to Cart Form -->
                        <form class="space-y-6 border-t border-gray-200 pt-8" action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            
                            <!-- Quantity Selector -->
                            <div>
                                <label for="quantity" class="block text-lg font-bold text-gray-900 mb-4">
                                    <i class="ri-add-box-line mr-2 text-primary-500"></i>
                                    Select Quantity
                                </label>
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center bg-gray-100 rounded-2xl overflow-hidden">
                                        <button type="button" onclick="decrement()" 
                                                class="w-12 h-12 bg-gray-200 hover:bg-gray-300 flex items-center justify-center transition-colors duration-200">
                                            <i class="ri-subtract-line text-lg font-bold"></i>
                                        </button>
                                        <input type="text" value="1" id="quantity" name="quantity" 
                                               class="w-20 h-12 text-center border-0 bg-transparent text-lg font-bold focus:outline-none">
                                        <button type="button" onclick="increment()" 
                                                class="w-12 h-12 bg-gray-200 hover:bg-gray-300 flex items-center justify-center transition-colors duration-200">
                                            <i class="ri-add-line text-lg font-bold"></i>
                                        </button>
                                    </div>
                                    <span class="text-gray-600">of {{ $product->stock }} available</span>
                                </div>
                            </div>
                            
                            <!-- Enhanced Action Buttons -->
                            <div class="flex flex-col sm:flex-row gap-4">
                                <button type="submit" class="flex-1 group relative overflow-hidden bg-gradient-to-r from-primary-500 to-primary-600 text-white py-4 px-8 rounded-2xl font-bold text-lg shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 hover:scale-105">
                                    <span class="absolute inset-0 bg-gradient-to-r from-primary-600 to-primary-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                                    <span class="relative flex items-center justify-center">
                                        <i class="ri-shopping-cart-2-line mr-3 text-xl"></i> 
                                        Add to Cart
                                    </span>
                                </button>
                                
                                @auth
                                    <button onclick="toggleWishlist({{ $product->id }}, this)" 
                                            type="button" 
                                            class="group bg-white border-2 border-gray-200 text-gray-700 py-4 px-8 rounded-2xl font-bold text-lg hover:border-red-300 hover:text-red-600 transition-all duration-300 transform hover:-translate-y-1 wishlist-btn"
                                            data-product-id="{{ $product->id }}">
                                        @if(auth()->user()->wishlists->contains('product_id', $product->id))
                                            <i class="ri-heart-fill mr-2 text-red-500"></i>
                                            Remove from Wishlist
                                        @else
                                            <i class="ri-heart-line mr-2 group-hover:ri-heart-fill"></i>
                                            Add to Wishlist
                                        @endif
                                    </button>
                                @else
                                    <a href="{{ route('login') }}" 
                                       class="group bg-white border-2 border-gray-200 text-gray-700 py-4 px-8 rounded-2xl font-bold text-lg hover:border-red-300 hover:text-red-600 transition-all duration-300 transform hover:-translate-y-1 inline-block text-center">
                                        <i class="ri-heart-line mr-2 group-hover:ri-heart-fill"></i>
                                        Add to Wishlist
                                    </a>
                                @endauth
                            </div>
                            
                            <!-- Trust Badges -->
                            <div class="grid grid-cols-3 gap-4 pt-6 border-t border-gray-200">
                                <div class="text-center">
                                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                        <i class="ri-shield-check-line text-green-600 text-xl"></i>
                                    </div>
                                    <div class="text-sm font-medium text-gray-900">Secure Payment</div>
                                </div>
                                <div class="text-center">
                                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                        <i class="ri-truck-line text-blue-600 text-xl"></i>
                                    </div>
                                    <div class="text-sm font-medium text-gray-900">Fast Delivery</div>
                                </div>
                                <div class="text-center">
                                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                        <i class="ri-customer-service-2-line text-purple-600 text-xl"></i>
                                    </div>
                                    <div class="text-sm font-medium text-gray-900">24/7 Support</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Reviews Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <!-- Reviews Header -->
            <div class="bg-gradient-to-r from-primary-50 to-primary-100 px-8 py-6 border-b border-primary-200">
                <h2 class="text-3xl font-black text-gray-900 mb-4">Customer Reviews</h2>
                
                <!-- Rating Summary -->
                <div class="grid lg:grid-cols-2 gap-8">
                    <!-- Overall Rating -->
                    <div class="flex items-center space-x-6">
                        <div class="text-center">
                            <div class="text-6xl font-black text-gray-900">{{ number_format($product->averageRating(), 1) }}</div>
                            <div class="flex justify-center text-yellow-400 text-xl my-2">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $product->averageRating())
                                        <i class="ri-star-fill"></i>
                                    @elseif($i - 0.5 <= $product->averageRating())
                                        <i class="ri-star-half-fill"></i>
                                    @else
                                        <i class="ri-star-line"></i>
                                    @endif
                                @endfor
                            </div>
                            <div class="text-gray-600 font-medium">{{ $product->totalReviews() }} Reviews</div>
                        </div>
                    </div>
                    
                    <!-- Rating Distribution -->
                    <div class="space-y-2">
                        @php $distribution = $product->ratingDistribution(); @endphp
                        @for($i = 5; $i >= 1; $i--)
                            <div class="flex items-center space-x-3">
                                <span class="text-sm font-medium text-gray-700 w-2">{{ $i }}</span>
                                <i class="ri-star-fill text-yellow-400 text-sm"></i>
                                <div class="flex-1 bg-gray-200 rounded-full h-2">
                                    <div class="bg-yellow-400 h-2 rounded-full" 
                                         style="width: {{ $product->totalReviews() > 0 ? ($distribution[$i] / $product->totalReviews()) * 100 : 0 }}%"></div>
                                </div>
                                <span class="text-sm text-gray-600 w-8">{{ $distribution[$i] }}</span>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            
            <!-- Add Review Button -->
            <div class="px-8 py-6 border-b border-gray-200">
                @auth
                    @if($product->canUserReview(auth()->id()))
                        <button onclick="openNewReviewModal()" 
                                class="group bg-gradient-to-r from-primary-500 to-primary-600 text-white px-6 py-3 rounded-xl font-bold hover:from-primary-600 hover:to-primary-700 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                            <i class="ri-add-line mr-2 group-hover:rotate-90 transition-transform duration-300"></i>
                            Write a Review
                        </button>
                    @else
                        <div class="text-gray-600 font-medium">
                            <i class="ri-check-line text-green-500 mr-2"></i>
                            You have already reviewed this product
                        </div>
                    @endif
                @else
                    <div class="text-gray-600">
                        <a href="{{ route('login') }}" class="text-primary-600 hover:text-primary-700 font-semibold">Login</a> to write a review
                    </div>
                @endauth
            </div>
            
            <!-- Reviews List -->
            <div class="px-8 py-6" id="reviewsList">
                @forelse($product->reviews()->latest()->get() as $review)
                    <div class="border-b border-gray-200 pb-6 mb-6 last:border-b-0 last:mb-0" data-review-id="{{ $review->id }}">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center space-x-4">
                                <!-- User Avatar -->
                                <div class="w-12 h-12 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                    {{ strtoupper(substr($review->user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="flex items-center space-x-2">
                                        <span class="font-bold text-gray-900">{{ $review->user->name }}</span>
                                        @if($review->verified_purchase)
                                            <span class="bg-green-100 text-green-800 text-xs font-bold px-2 py-1 rounded-full">
                                                <i class="ri-verified-badge-fill mr-1"></i>Verified Purchase
                                            </span>
                                        @endif
                                    </div>
                                    <div class="flex items-center space-x-2 mt-1">
                                        <div class="flex text-yellow-400">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $review->rating)
                                                    <i class="ri-star-fill text-sm"></i>
                                                @else
                                                    <i class="ri-star-line text-sm"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <span class="text-gray-500 text-sm">{{ $review->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Review Actions (for review owner) -->
                            @auth
                                @if($review->user_id === auth()->id())
                                    <div class="flex space-x-2">
                                        <button onclick="editReview({{ $review->id }}, {{ $review->rating }}, {{ json_encode($review->review ?? '') }})" 
                                                class="text-primary-600 hover:text-primary-700 text-sm font-medium">
                                            <i class="ri-edit-line"></i> Edit
                                        </button>
                                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="inline"
                                              onsubmit="return confirm('Are you sure you want to delete this review?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-700 text-sm font-medium">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                        
                        @if($review->review)
                            <p class="text-gray-700 leading-relaxed">{{ $review->review }}</p>
                        @endif
                    </div>
                @empty
                    <div class="text-center py-12">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="ri-chat-3-line text-gray-400 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">No Reviews Yet</h3>
                        <p class="text-gray-600">Be the first to review this product!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Review Modal -->
    <div id="reviewModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-md w-full p-6 transform transition-all duration-300 scale-95" id="reviewModalContent">
            <h3 class="text-2xl font-bold text-gray-900 mb-6" id="reviewModalTitle">Write a Review</h3>
            
            <form id="reviewForm" method="POST" action="/reviews">
                @csrf
                <div id="methodField"></div>
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="review_id" id="reviewId">
                
                <!-- Star Rating -->
                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-900 mb-3">Rating</label>
                    <div class="flex space-x-1" id="starRating">
                        @for($i = 1; $i <= 5; $i++)
                            <button type="button" class="star-btn text-3xl text-gray-300 hover:text-yellow-400 transition-colors duration-200" 
                                    data-rating="{{ $i }}" onclick="setRating({{ $i }})">
                                <i class="ri-star-line"></i>
                            </button>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="selectedRating" required>
                </div>
                
                <!-- Review Text -->
                <div class="mb-6">
                    <label for="reviewText" class="block text-sm font-bold text-gray-900 mb-3">Review (Optional)</label>
                    <textarea name="review" id="reviewText" rows="4" 
                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent resize-none"
                              placeholder="Share your experience with this product..."></textarea>
                </div>
                
                <!-- Modal Actions -->
                <div class="flex space-x-3">
                    <button type="button" onclick="closeReviewModal()" 
                            class="flex-1 bg-gray-200 text-gray-800 py-3 px-4 rounded-xl font-bold hover:bg-gray-300 transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="flex-1 bg-gradient-to-r from-primary-500 to-primary-600 text-white py-3 px-4 rounded-xl font-bold hover:from-primary-600 hover:to-primary-700 transition-all duration-200">
                        <span id="submitButtonText">Submit Review</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let quantity = document.getElementById('quantity');
        
        function increment(){
            let currentValue = parseInt(quantity.value);
            if (currentValue < {{$product->stock}}) {
                quantity.value = currentValue + 1;
                // Add animation effect
                quantity.classList.add('animate-pulse');
                setTimeout(() => quantity.classList.remove('animate-pulse'), 200);
            }
        }
        
        function decrement(){
            let currentValue = parseInt(quantity.value);
            if (currentValue > 1) {
                quantity.value = currentValue - 1;
                // Add animation effect
                quantity.classList.add('animate-pulse');
                setTimeout(() => quantity.classList.remove('animate-pulse'), 200);
            }
        }
        
        // Add validation to quantity input
        quantity.addEventListener('input', function() {
            let value = parseInt(this.value);
            if (isNaN(value) || value < 1) {
                this.value = 1;
            } else if (value > {{$product->stock}}) {
                this.value = {{$product->stock}};
            }
        });

        // Review Modal Functions
        let currentRating = 0;
        let isEditing = false;
        let editingReviewId = null;

        function openReviewModal() {
            document.getElementById('reviewModal').classList.remove('hidden');
            document.getElementById('reviewModal').classList.add('flex');
            document.getElementById('reviewModalContent').classList.remove('scale-95');
            document.getElementById('reviewModalContent').classList.add('scale-100');
        }

        function openNewReviewModal() {
            // Reset modal for new review
            resetModal();
            openReviewModal();
        }

        function closeReviewModal() {
            document.getElementById('reviewModal').classList.add('hidden');
            document.getElementById('reviewModal').classList.remove('flex');
            // Only reset if not editing, or reset after modal is closed
            setTimeout(() => {
                resetModal();
            }, 300); // Small delay for animation
        }

        function resetModal() {
            document.getElementById('reviewForm').reset();
            document.getElementById('reviewId').value = '';
            document.getElementById('selectedRating').value = '';
            document.getElementById('reviewText').value = '';
            document.getElementById('reviewModalTitle').textContent = 'Write a Review';
            document.getElementById('submitButtonText').textContent = 'Submit Review';
            currentRating = 0;
            isEditing = false;
            editingReviewId = null;
            updateStarDisplay();
        }

        function setRating(rating) {
            currentRating = rating;
            document.getElementById('selectedRating').value = rating;
            updateStarDisplay();
        }

        function updateStarDisplay() {
            const stars = document.querySelectorAll('.star-btn');
            stars.forEach((star, index) => {
                const starIcon = star.querySelector('i');
                if (index < currentRating) {
                    starIcon.className = 'ri-star-fill';
                    star.classList.add('text-yellow-400');
                    star.classList.remove('text-gray-300');
                } else {
                    starIcon.className = 'ri-star-line';
                    star.classList.add('text-gray-300');
                    star.classList.remove('text-yellow-400');
                }
            });
        }

        function editReview(reviewId, rating, reviewText) {
            console.log('Editing review:', reviewId, rating, reviewText); // Debug log
            
            isEditing = true;
            editingReviewId = reviewId;
            
            // Set form data
            document.getElementById('reviewId').value = reviewId;
            document.getElementById('reviewModalTitle').textContent = 'Edit Review';
            document.getElementById('submitButtonText').textContent = 'Update Review';
            
            // Set up form for PUT request
            document.getElementById('methodField').innerHTML = '<input type="hidden" name="_method" value="PUT">';
            document.getElementById('reviewForm').action = `/reviews/${reviewId}`;
            
            // Set the review text
            document.getElementById('reviewText').value = reviewText || '';
            
            // Set the rating
            setRating(parseInt(rating));
            
            // Open modal
            openReviewModal();
        }

        function resetModal() {
            document.getElementById('reviewForm').reset();
            document.getElementById('reviewForm').action = '/reviews';
            document.getElementById('reviewId').value = '';
            document.getElementById('selectedRating').value = '';
            document.getElementById('reviewText').value = '';
            document.getElementById('reviewModalTitle').textContent = 'Write a Review';
            document.getElementById('submitButtonText').textContent = 'Submit Review';
            
            // Clear method field for POST request
            document.getElementById('methodField').innerHTML = '';
            
            currentRating = 0;
            isEditing = false;
            editingReviewId = null;
            updateStarDisplay();
        }

        // Handle review form submission
        document.getElementById('reviewForm').addEventListener('submit', function(e) {
            if (currentRating === 0) {
                e.preventDefault();
                alert('Please select a rating');
                return;
            }
            // Form will submit normally with redirect and alert messages
        });

        // Close modal when clicking outside
        document.getElementById('reviewModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeReviewModal();
            }
        });

        // Toggle wishlist function
        function toggleWishlist(productId, button) {
            const icon = button.querySelector('i');
            const buttonText = button.childNodes[button.childNodes.length - 1];
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
                        icon.className = 'ri-heart-line mr-2 group-hover:ri-heart-fill';
                        buttonText.textContent = 'Add to Wishlist';
                        button.classList.remove('text-red-500');
                    } else {
                        // Add to wishlist
                        icon.className = 'ri-heart-fill mr-2 text-red-500';
                        buttonText.textContent = 'Remove from Wishlist';
                        button.classList.add('text-red-500');
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