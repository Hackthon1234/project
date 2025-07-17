@extends('layouts.master')
@section('content')
<div class="flex min-h-screen items-center justify-center bg-gradient-to-br from-indigo-100 via-purple-50 to-blue-50 p-4">
    <div class="w-full max-w-md">
        <!-- Logo Header -->
        <div class="text-center mb-8">
            <div class="mx-auto w-20 h-20 bg-white/90 rounded-xl flex items-center justify-center mb-4 shadow-sm backdrop-blur-sm border border-white/20">
                <img src="{{ asset('app1.png') }}" alt="Logo" class="h-10 filter brightness-0 invert">
            </div>
            <h1 class="text-2xl font-bold text-gray-800">Welcome Back</h1>
            <p class="text-gray-600 mt-1 text-sm">Sign in to your admin dashboard</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white/90 backdrop-blur-sm rounded-xl shadow-lg border border-white/20 overflow-hidden">
            <div class="p-8">
                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <!-- Email Field -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2 items-center">
                            <i class="ri-mail-line text-indigo-500 mr-2"></i> Email Address
                        </label>
                        <div class="relative">
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   placeholder="admin@vybecart.com" 
                                   class="w-full px-4 py-3 text-sm bg-white/80 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 transition duration-200 hover:border-indigo-300 @error('email') border-red-500 @enderror">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="ri-error-warning-line mr-1"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2 items-center">
                            <i class="ri-lock-2-line text-indigo-500 mr-2"></i> Password
                        </label>
                        <div class="relative">
                            <input type="password" 
                                   id="password" 
                                   name="password" 
                                   placeholder="••••••••" 
                                   class="w-full px-4 py-3 text-sm bg-white/80 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 transition duration-200 hover:border-indigo-300 @error('password') border-red-500 @enderror">
                            <button type="button" class="absolute right-3 top-3 text-gray-400 hover:text-indigo-500 transition-colors">
                                <i class="ri-eye-line"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="ri-error-warning-line mr-1"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <input id="remember" 
                                   name="remember" 
                                   type="checkbox" 
                                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-600">Remember this device</label>
                        </div>
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-500 hover:underline transition-colors">Forgot password?</a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full bg-gradient-to-br from-indigo-500 to-indigo-600 text-white py-3 px-4 rounded-lg shadow hover:shadow-md hover:-translate-y-0.5 transition transform duration-200 flex items-center justify-center font-medium">
                        <i class="ri-login-box-line mr-2"></i> Sign In
                    </button>
                </form>
            </div>

            <!-- Footer -->
            <div class="bg-white/80 px-8 py-4 border-t border-white/20 text-center">
                <p class="text-xs text-gray-600">© {{ date('Y') }} VybeCart. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>
@endsection