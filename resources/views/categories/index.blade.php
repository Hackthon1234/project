@extends('layouts.app')
@section('title', 'Categories')
@section('content')
    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
        <!-- Header with Add Button -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 tracking-tight">Categories</h2>
            <a href="{{ route('categories.create') }}"
                class="bg-gradient-to-br from-blue-500 to-indigo-600 px-4 py-2.5 rounded-xl shadow hover:shadow-md text-white font-medium hover:-translate-y-0.5 transition transform duration-200 flex items-center">
                <i class="ri-add-line mr-2 text-lg"></i> Add Category
            </a>
        </div>

        <!-- Optional Divider -->
        <div class="border-t border-gray-100 my-4"></div>

        <!-- Categories Table -->
        <div class="overflow-x-auto">
            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-indigo-50 to-blue-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Order
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Category Name</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Example Row And Looping -->    
                    @foreach($categories as $category)
                    <tr class="hover:bg-blue-50 transition-colors duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $category->order }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $category->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{route('categories.edit',$category->id)}}"
                                class="inline-flex items-center text-blue-600 hover:text-blue-800 mr-4 transition duration-200">
                                <i class="ri-pencil-line mr-1 text-lg"></i>
                                <div class="hover:underline"> Edit </div>
                            </a>
                            <a href="{{route('categories.destroy',$category->id)}}" onclick="return confirm('Are you sure you want to delete this category?')"
                                class="inline-flex items-center text-red-600 hover:text-red-800 transition duration-200">
                                <i class="ri-delete-bin-line mr-1 text-lg"></i>
                                <div class="hover:underline"> Delete </div>
                            </a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
