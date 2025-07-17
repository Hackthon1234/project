@extends('layouts.master')
@section('content')
    <div class="px-20 py-10">
        <h2 class="font-bold text-2xl border-l-4 border-blue-600 pl-2">latest products</h2>
        <div class="grid grid-cols-4 text-2xl pl-2 gap-4 mt-4">
            @foreach ($latestproducts as $product)
                <a href="{{ route('viewproduct', $product->id) }}" class="border p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="{{ asset('images/products/' . $product->photopath) }}" alt="Product Image"
                        class="w-full h-44 object-cover mb-2">
                    <h3 class="font-semibold">{{ $product->name }}</h3>
                    <p class="text-gray-600">
                        @if ($product->discounted_price != '')
                            <span class="px-2">${{ $product->price }}</span>
                            <span class="text-red-500 line-through px-2">${{ $product->discounted_price }}</span>
                        @else
                            <span class="px-2">${{ $product->price }}</span>
                        @endif
                    </p>
                </a>
            @endforeach


        </div>
    </div>
@endsection
