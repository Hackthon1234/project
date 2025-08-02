@extends('layouts.app')
@section('title', 'Edit User')
@section('content')

<div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 tracking-tight">Edit User</h2>
        <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 rounded-xl bg-gradient-to-r from-gray-50 to-gray-100 border border-gray-200 text-gray-700 font-medium hover:bg-gray-200 transition duration-200">
            <i class="ri-arrow-left-line mr-2"></i>
            Back to Users
        </a>
    </div>

    <!-- Optional Divider -->
    <div class="border-t border-gray-100 my-4"></div>

    <!-- Success/Error Messages -->
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

    <!-- Edit User Form -->
    <div class="max-w-2xl mx-auto">
        <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- User Avatar Display -->
            <div class="text-center mb-8">
                <div class="w-24 h-24 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="ri-user-line text-4xl text-indigo-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900">Editing: {{ $user->name }}</h3>
                <p class="text-gray-500">User ID: #{{ $user->id }}</p>
            </div>

            <!-- Name Field -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="ri-user-line mr-1"></i>Full Name
                </label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name', $user->name) }}" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                       required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="ri-mail-line mr-1"></i>Email Address
                </label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="{{ old('email', $user->email) }}" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                       required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Role Field -->
            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="ri-admin-line mr-1"></i>User Role
                </label>
                <select id="role" 
                        name="role" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200">
                    <option value="user" {{ ($user->role ?? 'user') == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Field (Optional) -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="ri-lock-line mr-1"></i>New Password (Leave blank to keep current)
                </label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password Field -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="ri-lock-line mr-1"></i>Confirm New Password
                </label>
                <input type="password" 
                       id="password_confirmation" 
                       name="password_confirmation" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200">
            </div>

            <!-- Account Status Display -->
            <div class="bg-gray-50 rounded-xl p-4">
                <h4 class="font-medium text-gray-900 mb-3">Account Status</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm text-gray-500">Email Verification</label>
                        <div class="mt-1">
                            @if($user->email_verified_at)
                                <span class="inline-flex items-center text-green-600 text-sm">
                                    <i class="ri-check-line mr-1"></i>
                                    Verified
                                </span>
                            @else
                                <span class="inline-flex items-center text-yellow-600 text-sm">
                                    <i class="ri-time-line mr-1"></i>
                                    Not Verified
                                </span>
                            @endif
                        </div>
                    </div>
                    <div>
                        <label class="text-sm text-gray-500">Member Since</label>
                        <div class="mt-1 text-sm text-gray-900">{{ $user->created_at->format('M d, Y') }}</div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-4 pt-6">
                <a href="{{ route('users.show', $user->id) }}" class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-xl text-gray-700 hover:bg-gray-50 transition duration-200">
                    <i class="ri-eye-line mr-2"></i>
                    View Details
                </a>
                <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-br from-blue-500 to-indigo-600 text-white rounded-xl shadow hover:shadow-md font-medium transition duration-200 hover:-translate-y-0.5">
                    <i class="ri-save-line mr-2"></i>
                    Update User
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
