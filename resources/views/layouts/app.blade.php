<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    @include('layouts.alert')
    <div class="flex min-h-screen bg-gray-50">
        <!-- Sidebar -->
        <div class="w-56 bg-gradient-to-b from-indigo-800 to-indigo-900 h-screen sticky top-0 shadow-xl">
            <div class="p-4 flex justify-center">
                <img src="{{ asset('app1.png') }}" alt="Logo" class="h-25 object-contain">
            </div>
            <hr class="border-indigo-600 mx-4 my-2">

            <nav class="mt-6 px-4 space-y-1">
                <a href="/dashboard"
                    class="flex items-center px-4 py-3 text-white/90 hover:text-white hover:bg-indigo-700 rounded-lg transition-all duration-200 group">
                    <i class="ri-dashboard-line text-lg mr-3 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                <a href="{{ route('categories.index') }}"
                    class="flex items-center px-4 py-3 text-white/90 hover:text-white hover:bg-indigo-700 rounded-lg transition-all duration-200 group">
                    <i class="ri-table-line text-lg mr-3 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Categories</span>
                </a>
                <a href="{{route('products.index')}}"
                    class="flex items-center px-4 py-3 text-white/90 hover:text-white hover:bg-indigo-700 rounded-lg transition-all duration-200 group">
                    <i class="ri-shopping-basket-2-line text-lg mr-3 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Products</span>
                </a>
                <a href="{{route('orders.index')}}"
                    class="flex items-center px-4 py-3 text-white/90 hover:text-white hover:bg-indigo-700 rounded-lg transition-all duration-200 group">
                    <i class="ri-shopping-cart-line text-lg mr-3 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Orders</span>
                </a>
                <a href="/users"
                    class="flex items-center px-4 py-3 text-white/90 hover:text-white hover:bg-indigo-700 rounded-lg transition-all duration-200 group">
                    <i class="ri-user-line text-lg mr-3 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Users</span>
                </a>
                <div class="absolute bottom-6 w-[calc(100%-32px)]">
                    <form action="{{route('logout')}}" method="POST"
                        class="flex items-center px-4 py-3 text-white/90 hover:text-white hover:bg-indigo-700 rounded-lg transition-all duration-200 group">
                        <i class="ri-logout-box-line text-lg mr-3 group-hover:scale-110 transition-transform"></i>
                        @csrf
                        <button class="font-medium" type="submit">Logout</button>
                    </form>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Header -->
            <header class="bg-white border-b border-gray-200 px-8 py-6">
                <h1 class="text-2xl font-bold text-gray-800">@yield('title')</h1>
            </header>

            <!-- Content -->
            <main class="p-8">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    @yield('content')
                </div>
            </main>
        </div>


</body>

</html>