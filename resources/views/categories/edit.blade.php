@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
<div class="max-w-lg mx-auto p-6"> <!-- Increased width by 1.5x -->
    <form action="{{ route('categories.update',$category->id) }}" method="POST" 
          class="bg-white rounded-xl shadow-lg border border-gray-200 p-8"> <!-- Increased padding -->
        
        <!-- Header -->
        <div class="mb-8 text-center">
            <div class="bg-indigo-100 w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4">
                <i class="ri-folder-add-line text-2xl text-indigo-600"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">Add New Category</h1>
        </div>

        @csrf
        
        <!-- Order Field -->
        <div class="mb-6">
            <label for="order" class="block text-sm font-medium text-gray-700 mb-2">
                <i class="ri-numbers-line mr-2 text-indigo-500"></i> Display Order
            </label>
            <input type="number" name="order" id="order" placeholder="Enter priority number"
                   class="w-full px-4 py-3 text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 transition duration-200"
                   value="{{ $category->order }}">
            @error('order')
                <p class="mt-2 text-sm text-red-600 flex items-center">
                    <i class="ri-error-warning-line mr-1"></i> {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Name Field -->
        <div class="mb-8">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                <i class="ri-price-tag-3-line mr-2 text-indigo-500"></i> Category Name
            </label>
            <input type="text" name="name" id="name" placeholder="e.g. Electronics, Clothing"
                   class="w-full px-4 py-3 text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 transition duration-200"
                   value="{{ $category->name }}">
            @error('name')
                <p class="mt-2 text-sm text-red-600 flex items-center">
                    <i class="ri-error-warning-line mr-1"></i> {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Form Actions -->
        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
            <a href="{{ route('categories.index') }}" 
               class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-200">
                Cancel
            </a>
            <button type="submit" 
                    class="px-5 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-lg shadow hover:bg-indigo-700 transition duration-200">
                Update Category
            </button>
        </div>
    </form>
</div>
@endsection