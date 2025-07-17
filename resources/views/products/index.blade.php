@extends('layouts.app')
@section('title', 'Products')
@section('content')

    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
        <!-- Header with Add Button -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 tracking-tight">Products</h2>
            <a href="{{ route('products.create') }}"
                class="bg-gradient-to-br from-blue-500 to-indigo-600 px-4 py-2.5 rounded-xl shadow hover:shadow-md text-white font-medium hover:-translate-y-0.5 transition transform duration-200 flex items-center">
                <i class="ri-add-line mr-2 text-lg"></i> Add Product
            </a>
        </div>

        <!-- Products Table -->
        <div class="overflow-x-auto">
            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-indigo-50 to-blue-50 sticky top-0">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Image
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Product
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Price
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Discounted</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Stock
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Category</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Static Product Row 1 -->
                    @foreach ($products as $product)
                        <tr class="hover:bg-blue-50/50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">

                                <img src="{{ asset('images/products/' . $product->photopath) }}" alt=""
                                    class="h-16 rounded-lg shadow-sm object-center">
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
                                <div class="text-xs text-gray-500 line-clamp-2">{{ $product->description }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">${{ number_format($product->price) }}</div>
                            </td>
                            <td class="px-9  py-4 whitespace-nowrap">
                                <div class="text-sm text-indigo-600 font-medium">
                                    ${{ number_format($product->discounted_price ?? 'N/A') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">
                                    {{ $product->stock }} in stock
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ $product->category->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="inline-flex items-center text-blue-600 hover:text-blue-800 mr-4 transition duration-200">
                                    <i class="ri-pencil-line mr-1 text-lg"></i>
                                    <span class="hover:underline">Edit</span>
                                </a>

                                <a href="{{ route('products.destroy', $product->id) }}"
                                    onclick="return confirm('Are you sure you want to delete this product?')"
                                    class="inline-flex items-center text-red-600 hover:text-red-800 transition duration-200">
                                    <i class="ri-delete-bin-line mr-1 text-lg"></i>
                                    <span class="hover:underline">Delete</span>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
