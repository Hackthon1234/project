<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    @include('layouts.alert')
    @php
        $categories = \App\Models\Category::orderBy('order', 'asc')->get();

    @endphp
    <div class="flex gap-6 justify-end py-3 px-12 text-white bg-red-500">
        @auth
            <a href="">Hi {{ auth()->user()->name }}</a>
        @endauth
        <a href="{{ route('myorders') }}">My Order</a>
        <a href="{{ route('mycart') }}">My Cart</a>
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-white">logout</button>
            </form>
        @else
            <a href="/login">login</a>
        @endauth

    </div>
    <nav class="flex justify-between items-center bg-blue-600 py-3 px-12 text-white">
        <h2 class=" font-bold text-lg">logo</h2>
        <form action="{{route('search')}}" method="GET">
            <input type="search" value="{{request('search')}}" placeholder="Search products" name="search" class="px-4 py-2 w-72 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 text-black" minlength="2" required>
            <button type="submit" class="bg-white text-blue-400 px-4 py-2 rounded">Search</button>
        </form>
        <div class="flex space-x-4">
            <a href="/">Home</a>
            @foreach ($categories as $category)
                <a href="{{ route('categoryproducts', $category->id) }}">{{ $category->name }}</a>
            @endforeach
        </div>
    </nav>

    @yield('content')

    <footer class="bg-gray-800 py-4 text-white text-center">
        <p>&copy; 2025 My Project. All rights reserved.</p>
    </footer>

</body>

</html>
