@extends('layouts.app')
@section('title', 'Edit Products')
@section('content')
    <div class="max-w-2xl mx-auto p-6">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white rounded-xl shadow-lg border border-gray-200 p-8">

            <!-- Header -->
            <div class="mb-8 text-center">
                <div class="bg-blue-100 w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="ri-shopping-bag-line text-2xl text-blue-600"></i>
                </div>
                <h1 class="text-2xl font-bold text-gray-800">Edit Product</h1>
            </div>

            @csrf

            <!-- Image Upload Field -->
            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="ri-image-line mr-2 text-blue-500"></i> Product Image
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                    <div class="space-y-1 text-center">
                        <i class="ri-upload-cloud-line text-3xl text-gray-400"></i>
                        <div class="flex text-sm text-gray-600">
                            <label for="image"
                                class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500">
                                <span>Upload a file</span>
                                <input id="image" name="photopath" type="file" class="sr-only">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                    </div>
                </div>

                @error('photopath')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="ri-error-warning-line mr-1"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Name Field -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="ri-shopping-bag-line mr-2 text-blue-500"></i> Product Name
                </label>
                <input type="text" name="name" id="name" placeholder="Enter product name"
                    value='{{ $product->name }}'
                    class="w-full px-4 py-3 text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200">

                @error('name')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="ri-error-warning-line mr-1"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Description Field -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="ri-text-wrap mr-2 text-blue-500"></i> Description
                </label>
                <textarea name="description" id="description" rows="3" placeholder="Enter product description"
                    class="w-full px-4 py-3 text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200">{{ $product->description }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="ri-error-warning-line mr-1"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Price Fields -->
            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="ri-money-dollar-circle-line mr-2 text-blue-500"></i> Regular Price
                    </label>
                    <input type="number" name="price" id="price" placeholder="0.00" step="0.01"
                        value="{{ $product->price }}"
                        class="w-full px-4 py-3 text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200">
                    @error('price')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="ri-error-warning-line mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                </div>
                <div>
                    <label for="discounted_price" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="ri-discount-percent-line mr-2 text-blue-500"></i> Discounted Price
                    </label>
                    <input type="number" name="discounted_price" id="discounted_price" placeholder="0.00" step="0.01"
                        value="{{ $product->discounted_price }}"
                        class="w-full px-4 py-3 text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200">
                    @error('discounted_price')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="ri-error-warning-line mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Stock Field -->
            <div class="mb-6">
                <label for="stock" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="ri-stack-line mr-2 text-blue-500"></i> Stock Quantity
                </label>
                <input type="number" name="stock" id="stock" placeholder="Enter stock quantity"
                    value="{{ $product->stock }}"
                    class="w-full px-4 py-3 text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200">
                @error('stock')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="ri-error-warning-line mr-1"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Category Field -->
            <div class="mb-8 relative">
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="ri-folder-line mr-2 text-blue-500"></i> Category
                </label>
                <div class="relative">
                    <select name="category_id" id="category"
                        class="appearance-none w-full px-4 py-3 text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200 bg-white pr-10">
                        <option value="" disabled selected>Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="ri-error-warning-line mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                        <i class="ri-arrow-down-s-line text-lg"></i>
                    </div>
                </div>
                <div class="mt-1 text-xs text-gray-500">
                    Choose the category that best fits your product
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('products.index') }}"
                    class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-200">
                    Cancel
                </a>
                <button type="submit"
                    class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                    Update Product
                </button>
            </div>
        </form>
    </div>
@endsection
