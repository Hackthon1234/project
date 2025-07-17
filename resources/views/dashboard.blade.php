@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="mt-4 px-6 py-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 text-white">

            <!-- Total Products -->
            <a href="#" class="group block transition-all duration-300 hover:-translate-y-1">
                <div
                    class="bg-gradient-to-br from-indigo-500 to-indigo-700 px-6 py-5 rounded-xl shadow-md flex flex-col items-center justify-center hover:shadow-xl transition-all duration-300 border border-indigo-400/20">
                    <div class="relative mb-3">
                        <div
                            class="absolute inset-0 bg-white/10 rounded-full blur-md group-hover:blur-lg transition-all duration-500">
                        </div>
                        <i class="ri-shopping-basket-2-line text-3xl relative z-10 text-white/90 group-hover:text-white"></i>
                    </div>
                    <div class="text-center space-y-1">
                        <h3 class="font-medium text-sm text-white/80 tracking-wider">TOTAL PRODUCTS</h3>
                        <p class="text-3xl font-bold text-white">1,024</p>
                    </div>
                </div>
            </a>

            <!-- Total Orders -->
            <a href="#" class="group block transition-all duration-300 hover:-translate-y-1">
                <div
                    class="bg-gradient-to-br from-emerald-500 to-emerald-700 px-6 py-5 rounded-xl shadow-md flex flex-col items-center justify-center hover:shadow-xl transition-all duration-300 border border-emerald-400/20">
                    <div class="relative mb-3">
                        <div
                            class="absolute inset-0 bg-white/10 rounded-full blur-md group-hover:blur-lg transition-all duration-500">
                        </div>
                        <i class="ri-shopping-cart-line text-3xl relative z-10 text-white/90 group-hover:text-white"></i>
                    </div>
                    <div class="text-center space-y-1">
                        <h3 class="font-medium text-sm text-white/80 tracking-wider">TOTAL ORDERS</h3>
                        <p class="text-3xl font-bold text-white">{{$totalorders}}</p>
                    </div>
                </div>
            </a>

            <!-- Total Users -->
            <a href="#" class="group block transition-all duration-300 hover:-translate-y-1">
                <div
                    class="bg-gradient-to-br from-violet-500 to-violet-700 px-6 py-5 rounded-xl shadow-md flex flex-col items-center justify-center hover:shadow-xl transition-all duration-300 border border-violet-400/20">
                    <div class="relative mb-3">
                        <div
                            class="absolute inset-0 bg-white/10 rounded-full blur-md group-hover:blur-lg transition-all duration-500">
                        </div>
                        <i class="ri-user-line text-3xl relative z-10 text-white/90 group-hover:text-white"></i>
                    </div>
                    <div class="text-center space-y-1">
                        <h3 class="font-medium text-sm text-white/80 tracking-wider">TOTAL USERS</h3>
                        <p class="text-3xl font-bold text-white">1,842</p>
                    </div>
                </div>
            </a>

            <!-- Total Categories -->
            <a href="#" class="group block transition-all duration-300 hover:-translate-y-1">
                <div
                    class="bg-gradient-to-br from-orange-500 to-orange-700 px-6 py-5 rounded-xl shadow-md flex flex-col items-center justify-center hover:shadow-xl transition-all duration-300 border border-orange-400/20">
                    <div class="relative mb-3">
                        <div
                            class="absolute inset-0 bg-white/10 rounded-full blur-md group-hover:blur-lg transition-all duration-500">
                        </div>
                        <i class="ri-layout-grid-line text-3xl relative z-10 text-white/90 group-hover:text-white"></i>
                    </div>
                    <div class="text-center space-y-1">
                        <h3 class="font-medium text-sm text-white/80 tracking-wider">CATEGORIES</h3>
                        <p class="text-3xl font-bold text-white">{{$totalcategories}}</p>
                    </div>
                </div>
            </a>

            <!-- Pending Order -->
            <a href="#" class="group block transition-all duration-300 hover:-translate-y-1">
                <div
                    class="bg-gradient-to-br from-yellow-400 to-yellow-600 px-6 py-5 rounded-xl shadow-md flex flex-col items-center justify-center hover:shadow-xl transition-all duration-300 border border-yellow-300/20">
                    <div class="relative mb-3">
                        <div
                            class="absolute inset-0 bg-white/10 rounded-full blur-md group-hover:blur-lg transition-all duration-500">
                        </div>
                        <i class="ri-time-line text-3xl relative z-10 text-white/90 group-hover:text-white"></i>
                    </div>
                    <div class="text-center space-y-1">
                        <h3 class="font-medium text-sm text-white/80 tracking-wider">PENDING ORDER</h3>
                        <p class="text-3xl font-bold text-white">{{$totalpendingorders}}</p>
                    </div>
                </div>
            </a>

            <!-- Processing Order -->
            <a href="#" class="group block transition-all duration-300 hover:-translate-y-1">
                <div
                    class="bg-gradient-to-br from-cyan-500 to-cyan-700 px-6 py-5 rounded-xl shadow-md flex flex-col items-center justify-center hover:shadow-xl transition-all duration-300 border border-cyan-400/20">
                    <div class="relative mb-3">
                        <div
                            class="absolute inset-0 bg-white/10 rounded-full blur-md group-hover:blur-lg transition-all duration-500">
                        </div>
                        <i class="ri-loader-2-line text-3xl relative z-10 text-white/90 group-hover:text-white"></i>
                    </div>
                    <div class="text-center space-y-1">
                        <h3 class="font-medium text-sm text-white/80 tracking-wider">PROCESSING ORDER</h3>
                        <p class="text-3xl font-bold text-white">{{$totalprocessingorders}}</p>
                    </div>
                </div>
            </a>

            <!-- Delivered Order -->
            <a href="#" class="group block transition-all duration-300 hover:-translate-y-1">
                <div
                    class="bg-gradient-to-br from-lime-500 to-lime-700 px-6 py-5 rounded-xl shadow-md flex flex-col items-center justify-center hover:shadow-xl transition-all duration-300 border border-lime-400/20">
                    <div class="relative mb-3">
                        <div
                            class="absolute inset-0 bg-white/10 rounded-full blur-md group-hover:blur-lg transition-all duration-500">
                        </div>
                        <i class="ri-truck-line text-3xl relative z-10 text-white/90 group-hover:text-white"></i>
                    </div>
                    <div class="text-center space-y-1">
                        <h3 class="font-medium text-sm text-white/80 tracking-wider">DELIVERED ORDER</h3>
                        <p class="text-3xl font-bold text-white">{{$totaldeliveredorders}}</p>
                    </div>
                </div>
            </a>

        </div>
    </div>
@endsection
