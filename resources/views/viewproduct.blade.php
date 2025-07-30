@extends('layouts.master')
@section('title', $product->name)
@section('content')
    <!-- Enhanced Product View Page -->
    <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 via-white to-primary-50/30 py-8">
        <!-- Background Decorations -->
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-gradient-to-br from-purple-100 to-pink-100 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        
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
                        
                        <!-- Floating Trust Indicators -->
                        <div class="absolute bottom-4 right-4 bg-white p-4 rounded-2xl shadow-xl border border-gray-100">
                            <div class="flex items-center space-x-2 mb-2">
                                <div class="flex text-yellow-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="ri-star-fill text-sm"></i>
                                    @endfor
                                </div>
                                <span class="text-xs text-gray-600 font-medium">(4.8)</span>
                            </div>
                            <div class="text-xs text-gray-500">127 reviews</div>
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
                                
                                <button type="button" class="group bg-white border-2 border-gray-200 text-gray-700 py-4 px-8 rounded-2xl font-bold text-lg hover:border-red-300 hover:text-red-600 transition-all duration-300 transform hover:-translate-y-1">
                                    <i class="ri-heart-line mr-2 group-hover:ri-heart-fill"></i>
                                    Wishlist
                                </button>
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
    </script>
@endsection