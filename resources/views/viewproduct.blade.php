@extends('layouts.master')
@section('content')
    <div class="px-20 py-10">
        <h2 class="font-bold text-2xl border-l-4 border-blue-600 pl-2">Product Details</h2>
        <div class="mt-4">
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/products/' . $product->photopath) }}" alt="Product Image"
                    class="w-64 h-64 object-cover rounded-lg shadow-lg">
                <div>
                    <h3 class="text-2xl font-semibold">{{ $product->name }}</h3>
                    <p class="text-gray-600 mt-2">
                        @if ($product->discounted_price != '')
                            <span class="text-lg font-bold">${{ $product->price }}</span>
                            <span class="text-red-500 line-through ml-2">${{ $product->discounted_price }}</span>
                        @else
                            <span class="text-lg font-bold">${{ $product->price }}</span>
                        @endif
                    </p>
                    <p class="mt-4">{{ $product->description }}</p>
                    <p class="mt-2 text-gray-500">Category: {{ $product->category->name }}</p>
                    <p class="mt-2 text-gray-500">Stock: {{ $product->stock }}</p>

                    <form class="mt-4" action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="flex items-center mt-4">
                            <input class="w-8 h-8 bg-gray-200" onclick="decrement()" value="-" type="button">
                            <input type="text" value="1" id="quantity" name="quantity" class="w-16 text-center border border-gray-300 rounded mx-2">
                            <input class="w-8 h-8 bg-gray-200" onclick="increment()" value="+" type="button">
                        </div>
                        <button class="mt-4 px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                            Add to Cart
                        </button>
                    </form>

                    <p class="mt-2 text-gray-500">Added on: {{ $product->created_at->format('d M Y') }}</p>
                </div>
                <div>
            
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
            }
        }
        function decrement(){
            let currentValue = parseInt(quantity.value);
            if (currentValue > 1) {
                quantity.value = currentValue - 1;
            }
        }
    </script>
    
@endsection