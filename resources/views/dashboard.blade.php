@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Enhanced Dashboard Header -->
    <div class="relative overflow-hidden bg-gradient-to-br from-primary-600 via-primary-700 to-purple-800 text-white py-16 mb-8">
        <!-- Background Decorations -->
        <div class="absolute -top-10 -right-10 w-64 h-64 bg-gradient-to-br from-white/10 to-white/5 rounded-full mix-blend-overlay filter blur-3xl"></div>
        <div class="absolute -bottom-10 -left-10 w-64 h-64 bg-gradient-to-br from-purple-500/20 to-pink-500/20 rounded-full mix-blend-overlay filter blur-3xl"></div>
        
        <div class="relative px-6">
            <div class="max-w-7xl mx-auto" data-aos="fade-up">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white text-sm font-semibold mb-4">
                    <i class="ri-dashboard-3-line mr-2"></i>
                    ADMIN DASHBOARD
                </div>
                <h1 class="text-4xl md:text-5xl font-black mb-4">
                    Welcome Back, <span class="text-gradient bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Admin</span>
                </h1>
                <p class="text-xl text-white/80 max-w-2xl">
                    Monitor your eCommerce performance and manage your store from this comprehensive dashboard
                </p>
            </div>
        </div>
    </div>

    <!-- Enhanced Stats Cards -->
    <div class="px-6 pb-6">
        <div class="max-w-7xl mx-auto">
            <!-- Primary Stats Row -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Products -->
                <div class="group" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-stack bg-gradient-to-br from-indigo-500 to-indigo-700 text-white rounded-3xl shadow-lg overflow-hidden transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:rotate-1">
                        <div class="p-8 relative">
                            <!-- Floating Icon Background -->
                            <div class="absolute top-4 right-4 w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                                <i class="ri-shopping-basket-2-line text-2xl text-white/80"></i>
                            </div>
                            
                            <div class="relative z-10">
                                <div class="text-white/70 text-sm font-bold uppercase tracking-wider mb-2">Total Products</div>
                                <div class="text-4xl font-black text-white mb-4">{{ $totalproducts ?? '1,024' }}</div>
                                <div class="flex items-center text-white/80 text-sm">
                                    <i class="ri-arrow-up-line mr-1"></i>
                                    <span>12% from last month</span>
                                </div>
                            </div>
                            
                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-r from-indigo-600/0 to-purple-600/20 group-hover:from-indigo-600/10 group-hover:to-purple-600/30 transition-all duration-500"></div>
                        </div>
                    </div>
                </div>

                <!-- Total Orders -->
                <div class="group" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-stack bg-gradient-to-br from-emerald-500 to-emerald-700 text-white rounded-3xl shadow-lg overflow-hidden transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:rotate-1">
                        <div class="p-8 relative">
                            <div class="absolute top-4 right-4 w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                                <i class="ri-shopping-cart-line text-2xl text-white/80"></i>
                            </div>
                            
                            <div class="relative z-10">
                                <div class="text-white/70 text-sm font-bold uppercase tracking-wider mb-2">Total Orders</div>
                                <div class="text-4xl font-black text-white mb-4">{{$totalorders}}</div>
                                <div class="flex items-center text-white/80 text-sm">
                                    <i class="ri-arrow-up-line mr-1"></i>
                                    <span>8% from last month</span>
                                </div>
                            </div>
                            
                            <div class="absolute inset-0 bg-gradient-to-r from-emerald-600/0 to-teal-600/20 group-hover:from-emerald-600/10 group-hover:to-teal-600/30 transition-all duration-500"></div>
                        </div>
                    </div>
                </div>

                <!-- Total Users -->
                <div class="group" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-stack bg-gradient-to-br from-violet-500 to-violet-700 text-white rounded-3xl shadow-lg overflow-hidden transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:rotate-1">
                        <div class="p-8 relative">
                            <div class="absolute top-4 right-4 w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                                <i class="ri-user-line text-2xl text-white/80"></i>
                            </div>
                            
                            <div class="relative z-10">
                                <div class="text-white/70 text-sm font-bold uppercase tracking-wider mb-2">Total Users</div>
                                <div class="text-4xl font-black text-white mb-4">{{ $totalusers ?? '1,842' }}</div>
                                <div class="flex items-center text-white/80 text-sm">
                                    <i class="ri-arrow-up-line mr-1"></i>
                                    <span>15% from last month</span>
                                </div>
                            </div>
                            
                            <div class="absolute inset-0 bg-gradient-to-r from-violet-600/0 to-purple-600/20 group-hover:from-violet-600/10 group-hover:to-purple-600/30 transition-all duration-500"></div>
                        </div>
                    </div>
                </div>

                <!-- Total Categories -->
                <div class="group" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-stack bg-gradient-to-br from-orange-500 to-orange-700 text-white rounded-3xl shadow-lg overflow-hidden transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:rotate-1">
                        <div class="p-8 relative">
                            <div class="absolute top-4 right-4 w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                                <i class="ri-layout-grid-line text-2xl text-white/80"></i>
                            </div>
                            
                            <div class="relative z-10">
                                <div class="text-white/70 text-sm font-bold uppercase tracking-wider mb-2">Categories</div>
                                <div class="text-4xl font-black text-white mb-4">{{$totalcategories}}</div>
                                <div class="flex items-center text-white/80 text-sm">
                                    <i class="ri-arrow-up-line mr-1"></i>
                                    <span>5% from last month</span>
                                </div>
                            </div>
                            
                            <div class="absolute inset-0 bg-gradient-to-r from-orange-600/0 to-red-600/20 group-hover:from-orange-600/10 group-hover:to-red-600/30 transition-all duration-500"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Status Row -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <!-- Pending Orders -->
                <div class="group" data-aos="fade-up" data-aos-delay="500">
                    <div class="card-stack bg-gradient-to-br from-yellow-400 to-yellow-600 text-white rounded-3xl shadow-lg overflow-hidden transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:rotate-1">
                        <div class="p-8 relative">
                            <div class="absolute top-4 right-4 w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                                <i class="ri-time-line text-2xl text-white/80"></i>
                            </div>
                            
                            <div class="relative z-10">
                                <div class="text-white/70 text-sm font-bold uppercase tracking-wider mb-2">Pending Orders</div>
                                <div class="text-4xl font-black text-white mb-4">{{$totalpendingorders}}</div>
                                <div class="flex items-center text-white/80 text-sm">
                                    <i class="ri-alert-line mr-1"></i>
                                    <span>Needs attention</span>
                                </div>
                            </div>
                            
                            <div class="absolute inset-0 bg-gradient-to-r from-yellow-500/0 to-orange-500/20 group-hover:from-yellow-500/10 group-hover:to-orange-500/30 transition-all duration-500"></div>
                        </div>
                    </div>
                </div>

                <!-- Processing Orders -->
                <div class="group" data-aos="fade-up" data-aos-delay="600">
                    <div class="card-stack bg-gradient-to-br from-cyan-500 to-cyan-700 text-white rounded-3xl shadow-lg overflow-hidden transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:rotate-1">
                        <div class="p-8 relative">
                            <div class="absolute top-4 right-4 w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                                <i class="ri-loader-2-line text-2xl text-white/80 animate-spin-slow"></i>
                            </div>
                            
                            <div class="relative z-10">
                                <div class="text-white/70 text-sm font-bold uppercase tracking-wider mb-2">Processing</div>
                                <div class="text-4xl font-black text-white mb-4">{{$totalprocessingorders}}</div>
                                <div class="flex items-center text-white/80 text-sm">
                                    <i class="ri-truck-line mr-1"></i>
                                    <span>In progress</span>
                                </div>
                            </div>
                            
                            <div class="absolute inset-0 bg-gradient-to-r from-cyan-600/0 to-blue-600/20 group-hover:from-cyan-600/10 group-hover:to-blue-600/30 transition-all duration-500"></div>
                        </div>
                    </div>
                </div>

                <!-- Delivered Orders -->
                <div class="group" data-aos="fade-up" data-aos-delay="700">
                    <div class="card-stack bg-gradient-to-br from-lime-500 to-lime-700 text-white rounded-3xl shadow-lg overflow-hidden transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:rotate-1">
                        <div class="p-8 relative">
                            <div class="absolute top-4 right-4 w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                                <i class="ri-truck-line text-2xl text-white/80"></i>
                            </div>
                            
                            <div class="relative z-10">
                                <div class="text-white/70 text-sm font-bold uppercase tracking-wider mb-2">Delivered</div>
                                <div class="text-4xl font-black text-white mb-4">{{$totaldeliveredorders}}</div>
                                <div class="flex items-center text-white/80 text-sm">
                                    <i class="ri-check-line mr-1"></i>
                                    <span>Completed</span>
                                </div>
                            </div>
                            
                            <div class="absolute inset-0 bg-gradient-to-r from-lime-600/0 to-green-600/20 group-hover:from-lime-600/10 group-hover:to-green-600/30 transition-all duration-500"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Section -->
            <div class="mt-12" data-aos="fade-up" data-aos-delay="800">
                <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100">
                    <h3 class="text-2xl font-black text-gray-900 mb-6 flex items-center">
                        <i class="ri-flash-line text-primary-500 mr-3"></i>
                        Quick Actions
                    </h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <button class="flex items-center justify-center px-6 py-4 bg-gradient-to-r from-primary-50 to-primary-100 rounded-2xl border border-primary-200 text-primary-700 hover:from-primary-100 hover:to-primary-200 transition-all duration-300 transform hover:-translate-y-1">
                            <i class="ri-add-line mr-2"></i>
                            Add Product
                        </button>
                        
                        <button class="flex items-center justify-center px-6 py-4 bg-gradient-to-r from-green-50 to-green-100 rounded-2xl border border-green-200 text-green-700 hover:from-green-100 hover:to-green-200 transition-all duration-300 transform hover:-translate-y-1">
                            <i class="ri-eye-line mr-2"></i>
                            View Orders
                        </button>
                        
                        <button class="flex items-center justify-center px-6 py-4 bg-gradient-to-r from-purple-50 to-purple-100 rounded-2xl border border-purple-200 text-purple-700 hover:from-purple-100 hover:to-purple-200 transition-all duration-300 transform hover:-translate-y-1">
                            <i class="ri-user-settings-line mr-2"></i>
                            Manage Users
                        </button>
                        
                        <button class="flex items-center justify-center px-6 py-4 bg-gradient-to-r from-orange-50 to-orange-100 rounded-2xl border border-orange-200 text-orange-700 hover:from-orange-100 hover:to-orange-200 transition-all duration-300 transform hover:-translate-y-1">
                            <i class="ri-bar-chart-2-line mr-2"></i>
                            View Reports
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
