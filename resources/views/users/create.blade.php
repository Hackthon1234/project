{{--
    =====================================================
    VybeCart - Create User
    =====================================================
    Description: Form to add new users to the system with role assignment
    Author: VybeCart Team
    Last Modified: 2025-12-28
    =====================================================
--}}
@extends('layouts.app')
@section('title', 'Create New User')
@section('content')

<div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
    
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 tracking-tight">Create New User</h2>
        <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 rounded-xl bg-gradient-to-r from-gray-50 to-gray-100 border border-gray-200 text-gray-700 font-medium hover:bg-gray-200 transition duration-200">
            <i class="ri-arrow-left-line mr-2"></i>
            Back to Users
        </a>
    </div>

    
    <div class="border-t border-gray-100 my-4"></div>

    
    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl">
            <div class="flex items-center">
                <i class="ri-check-circle-line mr-2"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl">
            <div class="flex items-center">
                <i class="ri-error-warning-line mr-2"></i>
                {{ session('error') }}
            </div>
        </div>
    @endif

    
    <div class="max-w-2xl mx-auto">
        <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
            @csrf
            
            
            <div class="text-center mb-8">
                <div class="w-24 h-24 bg-gradient-to-br from-green-100 to-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="ri-user-add-line text-4xl text-green-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900">Add New User</h3>
                <p class="text-gray-500">Fill in the details below to create a new user account</p>
            </div>

            
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="ri-user-line mr-1"></i>Full Name
                </label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name') }}" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                       placeholder="Enter full name"
                       required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="ri-mail-line mr-1"></i>Email Address
                </label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                       placeholder="Enter email address"
                       required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="ri-admin-line mr-1"></i>User Role
                </label>
                <select id="role" 
                        name="role" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200">
                    <option value="user" {{ old('role', 'user') == 'user' ? 'selected' : '' }}>Regular User</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrator</option>
                </select>
                <p class="text-sm text-gray-500 mt-1">Select the role for this user account</p>
                @error('role')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="ri-lock-line mr-1"></i>Password
                </label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                       placeholder="Enter password (minimum 8 characters)"
                       required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="ri-lock-line mr-1"></i>Confirm Password
                </label>
                <input type="password" 
                       id="password_confirmation" 
                       name="password_confirmation" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                       placeholder="Confirm password"
                       required>
            </div>

            
            <div class="bg-gray-50 rounded-xl p-4">
                <h4 class="font-medium text-gray-900 mb-2">Password Requirements</h4>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li class="flex items-center">
                        <i class="ri-check-line text-green-500 mr-2"></i>
                        Minimum 8 characters
                    </li>
                    <li class="flex items-center">
                        <i class="ri-check-line text-green-500 mr-2"></i>
                        Password confirmation must match
                    </li>
                </ul>
            </div>

            
            <div class="flex justify-end gap-4 pt-6">
                <a href="{{ route('users.index') }}" class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-xl text-gray-700 hover:bg-gray-50 transition duration-200">
                    <i class="ri-close-line mr-2"></i>
                    Cancel
                </a>
                <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-br from-green-500 to-blue-600 text-white rounded-xl shadow hover:shadow-md font-medium transition duration-200 hover:-translate-y-0.5">
                    <i class="ri-user-add-line mr-2"></i>
                    Create User
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
