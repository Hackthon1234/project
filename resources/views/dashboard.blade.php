@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6 mb-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 tracking-tight">Admin Dashboard</h2>
            <div class="inline-flex items-center px-4 py-2 rounded-xl bg-gradient-to-r from-indigo-50 to-blue-50 border border-indigo-200 text-indigo-700 text-sm font-semibold">
                <i class="ri-dashboard-3-line mr-2"></i>
                Overview
            </div>
        </div>

        <!-- Optional Divider -->
        <div class="border-t border-gray-100 my-4"></div>

        <!-- Welcome Message -->
        <div class="text-center py-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">
                Welcome Back, <span class="text-indigo-600">{{ auth()->user()->name }}</span>
            </h1>
            <p class="text-lg text-gray-600">
                Monitor your eCommerce performance and manage your store
            </p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Total Products -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-gray-600 text-sm font-medium uppercase tracking-wider mb-2">Total Products</div>
                    <div class="text-3xl font-bold text-gray-900">{{ $totalproducts }}</div>
                    <div class="flex items-center text-green-600 text-sm mt-2">
                        <i class="ri-box-3-line mr-1"></i>
                        <span>Available in store</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center">
                    <i class="ri-shopping-basket-2-line text-2xl text-indigo-600"></i>
                </div>
            </div>
        </div>

        <!-- Total Orders -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-gray-600 text-sm font-medium uppercase tracking-wider mb-2">Total Orders</div>
                    <div class="text-3xl font-bold text-gray-900">{{ $totalorders }}</div>
                    <div class="flex items-center text-green-600 text-sm mt-2">
                        <i class="ri-arrow-up-line mr-1"></i>
                        <span>8% from last month</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
                    <i class="ri-shopping-cart-line text-2xl text-emerald-600"></i>
                </div>
            </div>
        </div>

        <!-- Total Users -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-gray-600 text-sm font-medium uppercase tracking-wider mb-2">Total Users</div>
                    <div class="text-3xl font-bold text-gray-900">{{ $totalusers }}</div>
                    <div class="flex items-center text-blue-600 text-sm mt-2">
                        <i class="ri-user-add-line mr-1"></i>
                        <span>{{ $totalAdmins }} Admins, {{ $totalRegularUsers }} Users</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <i class="ri-user-line text-2xl text-purple-600"></i>
                </div>
            </div>
        </div>

        <!-- Total Categories -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-gray-600 text-sm font-medium uppercase tracking-wider mb-2">Categories</div>
                    <div class="text-3xl font-bold text-gray-900">{{ $totalcategories }}</div>
                    <div class="flex items-center text-green-600 text-sm mt-2">
                        <i class="ri-arrow-up-line mr-1"></i>
                        <span>5% from last month</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                    <i class="ri-layout-grid-line text-2xl text-orange-600"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Status Row -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">
        <!-- Pending Orders -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-gray-600 text-sm font-medium uppercase tracking-wider mb-2">Pending Orders</div>
                    <div class="text-3xl font-bold text-gray-900">{{ $totalpendingorders }}</div>
                    <div class="flex items-center text-yellow-600 text-sm mt-2">
                        <i class="ri-hourglass-line mr-1"></i>
                        <span>Awaiting confirmation</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                    <i class="ri-time-line text-2xl text-yellow-600"></i>
                </div>
            </div>
        </div>

        <!-- Processing Orders -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-gray-600 text-sm font-medium uppercase tracking-wider mb-2">Processing</div>
                    <div class="text-3xl font-bold text-gray-900">{{ $totalprocessingorders }}</div>
                    <div class="flex items-center text-blue-600 text-sm mt-2">
                        <i class="ri-truck-line mr-1"></i>
                        <span>In progress</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-cyan-100 rounded-xl flex items-center justify-center">
                    <i class="ri-loader-2-line text-2xl text-cyan-600"></i>
                </div>
            </div>
        </div>

        <!-- Delivered Orders -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-gray-600 text-sm font-medium uppercase tracking-wider mb-2">Delivered</div>
                    <div class="text-3xl font-bold text-gray-900">{{ $totaldeliveredorders }}</div>
                    <div class="flex items-center text-green-600 text-sm mt-2">
                        <i class="ri-check-line mr-1"></i>
                        <span>Completed</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-lime-100 rounded-xl flex items-center justify-center">
                    <i class="ri-truck-line text-2xl text-lime-600"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- User Statistics Row -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
        <!-- Email Verification Stats -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6 overflow-hidden relative verification-card animate-fade-scale">
            <!-- Background Pattern -->
            <div class="absolute top-0 right-0 w-32 h-32 opacity-5">
                <svg viewBox="0 0 100 100" class="w-full h-full">
                    <circle cx="50" cy="50" r="45" fill="currentColor" class="text-green-500"/>
                </svg>
            </div>
            
            <div class="flex items-center justify-between mb-6 relative z-10">
                <h3 class="text-lg font-semibold text-gray-800">Email Verification Status</h3>
                <div class="w-10 h-10 bg-gradient-to-br from-green-100 to-emerald-100 rounded-lg flex items-center justify-center shadow-sm">
                    <i class="ri-mail-check-line text-lg text-green-600"></i>
                </div>
            </div>
            
            <div class="space-y-4 relative z-10">
                <!-- Verified Users -->
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg p-4 border border-green-100 animate-slide-in">
                    <div class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-2 animate-pulse"></div>
                            <span class="text-gray-700 font-medium">Verified Users</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-green-600">{{ $verifiedUsers }}</span>
                            <span class="text-sm text-green-600 font-medium ml-2">({{ $totalusers > 0 ? round(($verifiedUsers / $totalusers) * 100) : 0 }}%)</span>
                        </div>
                    </div>
                    <!-- Progress Bar -->
                    <div class="w-full bg-green-200 rounded-full h-2">
                        <div class="bg-gradient-to-r from-green-500 to-emerald-500 h-2 rounded-full transition-all duration-1000 ease-out progress-glow" 
                             style="width: {{ $totalusers > 0 ? ($verifiedUsers / $totalusers) * 100 : 0 }}%"></div>
                    </div>
                </div>

                <!-- Unverified Users -->
                <div class="bg-gradient-to-r from-yellow-50 to-amber-50 rounded-lg p-4 border border-yellow-100 animate-slide-in" style="animation-delay: 0.2s;">
                    <div class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2 animate-pulse"></div>
                            <span class="text-gray-700 font-medium">Pending Verification</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-yellow-600">{{ $unverifiedUsers }}</span>
                            <span class="text-sm text-yellow-600 font-medium ml-2">({{ $totalusers > 0 ? round(($unverifiedUsers / $totalusers) * 100) : 0 }}%)</span>
                        </div>
                    </div>
                    <!-- Progress Bar -->
                    <div class="w-full bg-yellow-200 rounded-full h-2">
                        <div class="bg-gradient-to-r from-yellow-500 to-amber-500 h-2 rounded-full transition-all duration-1000 ease-out" 
                             style="width: {{ $totalusers > 0 ? ($unverifiedUsers / $totalusers) * 100 : 0 }}%"></div>
                    </div>
                </div>

                <!-- Summary Stats -->
                <div class="flex justify-between items-center pt-2 border-t border-gray-100 animate-slide-in" style="animation-delay: 0.4s;">
                    <div class="text-center">
                        <div class="text-sm text-gray-500">Total Users</div>
                        <div class="text-lg font-bold text-gray-800">{{ $totalusers }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-sm text-gray-500">Verification Rate</div>
                        <div class="text-lg font-bold {{ $totalusers > 0 && ($verifiedUsers / $totalusers) > 0.7 ? 'text-green-600' : 'text-yellow-600' }}">
                            {{ $totalusers > 0 ? round(($verifiedUsers / $totalusers) * 100) : 0 }}%
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Users -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Recent Users</h3>
                <a href="{{ route('users.index') }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">View All</a>
            </div>
            <div class="space-y-3">
                @forelse($recentUsers as $user)
                <div class="flex items-center justify-between py-2">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full flex items-center justify-center">
                            <i class="ri-user-line text-sm text-indigo-600"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">{{ $user->name }}</p>
                            <p class="text-xs text-gray-500">{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                            @if($user->role == 'admin') bg-purple-100 text-purple-800
                            @else bg-blue-100 text-blue-800
                            @endif">
                            {{ ucfirst($user->role) }}
                        </span>
                        <p class="text-xs text-gray-500 mt-1">{{ $user->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @empty
                <div class="text-center py-4 text-gray-500">
                    <i class="ri-user-line text-2xl mb-2"></i>
                    <p class="text-sm">No users found</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Analytics Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- Order Status Chart -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Order Status Distribution</h3>
                <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                    <i class="ri-pie-chart-line text-lg text-indigo-600"></i>
                </div>
            </div>
            <div class="relative">
                <canvas id="orderStatusChart" width="400" height="200" class="max-h-48"></canvas>
            </div>
        </div>

        <!-- User Growth Chart -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-800">User Registration Trend</h3>
                <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                    <i class="ri-line-chart-line text-lg text-emerald-600"></i>
                </div>
            </div>
            <div class="relative">
                <canvas id="userGrowthChart" width="400" height="200" class="max-h-48"></canvas>
            </div>
        </div>
    </div>

    <!-- Sales Revenue Chart -->
    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6 mb-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Monthly Sales Revenue</h3>
            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="ri-bar-chart-line text-lg text-purple-600"></i>
            </div>
        </div>
        <div class="relative">
            <canvas id="salesChart" width="800" height="300" class="max-h-64"></canvas>
        </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 tracking-tight">Quick Actions</h2>
        </div>
        
        <!-- Optional Divider -->
        <div class="border-t border-gray-100 my-4"></div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('products.create') }}" class="flex items-center justify-center px-6 py-4 bg-gradient-to-br from-blue-500 to-indigo-600 text-white rounded-xl shadow hover:shadow-md font-medium transition duration-200 hover:-translate-y-0.5">
                <i class="ri-add-line mr-2 text-lg"></i>
                Add Product
            </a>
            
            <a href="{{ route('orders.index') }}" class="flex items-center justify-center px-6 py-4 bg-gradient-to-br from-emerald-500 to-green-600 text-white rounded-xl shadow hover:shadow-md font-medium transition duration-200 hover:-translate-y-0.5">
                <i class="ri-eye-line mr-2 text-lg"></i>
                View Orders
            </a>
            
            <a href="{{ route('users.index') }}" class="flex items-center justify-center px-6 py-4 bg-gradient-to-br from-purple-500 to-violet-600 text-white rounded-xl shadow hover:shadow-md font-medium transition duration-200 hover:-translate-y-0.5">
                <i class="ri-user-settings-line mr-2 text-lg"></i>
                Manage Users
            </a>
            
            <a href="{{ route('categories.index') }}" class="flex items-center justify-center px-6 py-4 bg-gradient-to-br from-orange-500 to-red-600 text-white rounded-xl shadow hover:shadow-md font-medium transition duration-200 hover:-translate-y-0.5">
                <i class="ri-layout-grid-line mr-2 text-lg"></i>
                Manage Categories
            </a>
        </div>
    </div>

<!-- Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Custom Styles for Enhanced UI -->
<style>
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .animate-slide-in {
        animation: slideInUp 0.6s ease-out;
    }

    .animate-fade-scale {
        animation: fadeInScale 0.5s ease-out;
    }

    .progress-glow {
        box-shadow: 0 0 10px rgba(16, 185, 129, 0.3);
    }

    .verification-card:hover .progress-glow {
        box-shadow: 0 0 15px rgba(16, 185, 129, 0.5);
        transition: box-shadow 0.3s ease;
    }
</style>

<script>
// Chart.js Global Configuration
Chart.defaults.font.family = 'Inter, system-ui, sans-serif';
Chart.defaults.color = '#6B7280';

// Order Status Pie Chart
const orderStatusCtx = document.getElementById('orderStatusChart').getContext('2d');
const orderStatusChart = new Chart(orderStatusCtx, {
    type: 'doughnut',
    data: {
        labels: {!! json_encode($orderStatusData['labels']) !!},
        datasets: [{
            data: {!! json_encode($orderStatusData['data']) !!},
            backgroundColor: {!! json_encode($orderStatusData['colors']) !!},
            borderWidth: 0,
            hoverBorderWidth: 3,
            hoverBorderColor: '#ffffff'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '60%',
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    padding: 20,
                    usePointStyle: true,
                    font: {
                        size: 12,
                        weight: '500'
                    }
                }
            },
            tooltip: {
                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                titleColor: '#ffffff',
                bodyColor: '#ffffff',
                borderColor: 'rgba(255, 255, 255, 0.1)',
                borderWidth: 1,
                cornerRadius: 8,
                displayColors: false,
                callbacks: {
                    label: function(context) {
                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                        const percentage = ((context.raw / total) * 100).toFixed(1);
                        return context.label + ': ' + context.raw + ' (' + percentage + '%)';
                    }
                }
            }
        },
        hover: {
            animationDuration: 300
        },
        animation: {
            animateRotate: true,
            duration: 1000
        }
    }
});

// User Growth Line Chart
const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
const userGrowthChart = new Chart(userGrowthCtx, {
    type: 'line',
    data: {
        labels: {!! json_encode($userGrowthData['labels']) !!},
        datasets: [{
            label: 'New Users',
            data: {!! json_encode($userGrowthData['data']) !!},
            borderColor: '#10B981',
            backgroundColor: 'rgba(16, 185, 129, 0.1)',
            borderWidth: 3,
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#10B981',
            pointBorderColor: '#ffffff',
            pointBorderWidth: 2,
            pointRadius: 5,
            pointHoverRadius: 8,
            pointHoverBorderWidth: 3
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                titleColor: '#ffffff',
                bodyColor: '#ffffff',
                borderColor: 'rgba(255, 255, 255, 0.1)',
                borderWidth: 1,
                cornerRadius: 8,
                displayColors: false
            }
        },
        scales: {
            x: {
                grid: {
                    display: false
                },
                border: {
                    display: false
                }
            },
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(156, 163, 175, 0.2)'
                },
                border: {
                    display: false
                }
            }
        },
        hover: {
            intersect: false,
            mode: 'index'
        },
        animation: {
            duration: 1200,
            easing: 'easeInOutQuart'
        }
    }
});

// Sales Revenue Bar Chart
const salesCtx = document.getElementById('salesChart').getContext('2d');
const salesChart = new Chart(salesCtx, {
    type: 'bar',
    data: {
        labels: {!! json_encode($salesData['labels']) !!},
        datasets: [{
            label: 'Revenue ($)',
            data: {!! json_encode($salesData['data']) !!},
            backgroundColor: 'rgba(99, 102, 241, 0.8)',
            borderColor: '#6366F1',
            borderWidth: 2,
            borderRadius: 8,
            borderSkipped: false,
            hoverBackgroundColor: 'rgba(99, 102, 241, 1)',
            hoverBorderColor: '#4F46E5',
            hoverBorderWidth: 3
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                titleColor: '#ffffff',
                bodyColor: '#ffffff',
                borderColor: 'rgba(255, 255, 255, 0.1)',
                borderWidth: 1,
                cornerRadius: 8,
                displayColors: false,
                callbacks: {
                    label: function(context) {
                        return 'Revenue: $' + context.raw.toLocaleString();
                    }
                }
            }
        },
        scales: {
            x: {
                grid: {
                    display: false
                },
                border: {
                    display: false
                }
            },
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(156, 163, 175, 0.2)'
                },
                border: {
                    display: false
                },
                ticks: {
                    callback: function(value) {
                        return '$' + value.toLocaleString();
                    }
                }
            }
        },
        hover: {
            animationDuration: 200
        },
        animation: {
            duration: 1000,
            easing: 'easeInOutQuart'
        }
    }
});

// Add hover animations to stat cards
document.addEventListener('DOMContentLoaded', function() {
    const statCards = document.querySelectorAll('.bg-white.rounded-xl.shadow-md');
    
    statCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
            this.style.boxShadow = '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)';
            this.style.transition = 'all 0.2s ease-in-out';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)';
        });
    });
});
</script>

@endsection
