@extends('layouts.app')
@section('title', 'User Details')
@section('content')

<div class="bg-white rounded-xl shadow-md border border-gray-200 p-6 mb-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 tracking-tight">User Details</h2>
        <div class="flex gap-3">
            <a href="{{ route('users.edit', $user->id) }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-br from-blue-500 to-indigo-600 text-white rounded-xl shadow hover:shadow-md font-medium transition duration-200 hover:-translate-y-0.5">
                <i class="ri-pencil-line mr-2"></i>
                Edit User
            </a>
            <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 rounded-xl bg-gradient-to-r from-gray-50 to-gray-100 border border-gray-200 text-gray-700 font-medium hover:bg-gray-200 transition duration-200">
                <i class="ri-arrow-left-line mr-2"></i>
                Back to Users
            </a>
        </div>
    </div>

    <!-- Optional Divider -->
    <div class="border-t border-gray-100 my-4"></div>

    <!-- User Profile Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- User Avatar and Basic Info -->
        <div class="lg:col-span-1">
            <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-8 text-center border border-indigo-200">
                <div class="w-32 h-32 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="ri-user-line text-6xl text-indigo-600"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $user->name }}</h3>
                <p class="text-gray-600 mb-4">{{ $user->email }}</p>
                
                <!-- Role Badge -->
                <div class="flex justify-center mb-4">
                    <span class="px-4 py-2 text-sm rounded-full font-medium
                        @if($user->role == 'admin') bg-purple-100 text-purple-800
                        @else bg-blue-100 text-blue-800
                        @endif">
                        {{ ucfirst($user->role ?? 'User') }}
                    </span>
                </div>
                
                <!-- Status Badge -->
                <div class="flex justify-center">
                    <span class="px-4 py-2 text-sm rounded-full font-medium
                        @if($user->email_verified_at) bg-green-100 text-green-800
                        @else bg-yellow-100 text-yellow-800
                        @endif">
                        @if($user->email_verified_at) 
                            <i class="ri-check-line mr-1"></i>Account Active
                        @else 
                            <i class="ri-time-line mr-1"></i>Pending Verification
                        @endif
                    </span>
                </div>
            </div>
        </div>

        <!-- User Details -->
        <div class="lg:col-span-2">
            <div class="space-y-6">
                <!-- Account Information -->
                <div class="bg-gray-50 rounded-xl p-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="ri-information-line text-indigo-600 mr-2"></i>
                        Account Information
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wider">Full Name</label>
                            <div class="mt-1 text-lg font-medium text-gray-900">{{ $user->name }}</div>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wider">Email Address</label>
                            <div class="mt-1 text-lg font-medium text-gray-900">{{ $user->email }}</div>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wider">User Role</label>
                            <div class="mt-1 text-lg font-medium text-gray-900">{{ ucfirst($user->role ?? 'User') }}</div>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wider">User ID</label>
                            <div class="mt-1 text-lg font-medium text-gray-900">#{{ $user->id }}</div>
                        </div>
                    </div>
                </div>

                <!-- Account Status -->
                <div class="bg-gray-50 rounded-xl p-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="ri-shield-check-line text-green-600 mr-2"></i>
                        Account Status
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wider">Email Verification</label>
                            <div class="mt-1">
                                @if($user->email_verified_at)
                                    <span class="inline-flex items-center text-green-600">
                                        <i class="ri-check-line mr-1"></i>
                                        Verified on {{ $user->email_verified_at->format('M d, Y') }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center text-yellow-600">
                                        <i class="ri-time-line mr-1"></i>
                                        Not Verified
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wider">Account Status</label>
                            <div class="mt-1">
                                @if($user->email_verified_at)
                                    <span class="inline-flex items-center text-green-600">
                                        <i class="ri-check-circle-line mr-1"></i>
                                        Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center text-yellow-600">
                                        <i class="ri-time-line mr-1"></i>
                                        Pending
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Registration Details -->
                <div class="bg-gray-50 rounded-xl p-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="ri-calendar-line text-blue-600 mr-2"></i>
                        Registration Details
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wider">Registration Date</label>
                            <div class="mt-1 text-lg font-medium text-gray-900">{{ $user->created_at->format('M d, Y') }}</div>
                            <div class="text-sm text-gray-500">{{ $user->created_at->format('h:i A') }}</div>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wider">Last Updated</label>
                            <div class="mt-1 text-lg font-medium text-gray-900">{{ $user->updated_at->format('M d, Y') }}</div>
                            <div class="text-sm text-gray-500">{{ $user->updated_at->format('h:i A') }}</div>
                        </div>
                    </div>
                </div>

                <!-- User Statistics (if you have orders or other data) -->
                @php
                    $userOrders = $user->orders ?? collect();
                    $userCarts = $user->carts ?? collect();
                @endphp
                
                <div class="bg-gray-50 rounded-xl p-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="ri-bar-chart-line text-purple-600 mr-2"></i>
                        User Activity
                    </h4>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="bg-white rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-indigo-600">{{ $userOrders->count() }}</div>
                            <div class="text-sm text-gray-500">Total Orders</div>
                        </div>
                        <div class="bg-white rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-green-600">{{ $userCarts->count() }}</div>
                            <div class="text-sm text-gray-500">Cart Items</div>
                        </div>
                        <div class="bg-white rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-purple-600">{{ $user->created_at->diffInDays(now()) }}</div>
                            <div class="text-sm text-gray-500">Days Since Joined</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="mt-8 flex justify-end gap-4">
        @if($user->id !== auth()->id())
            <button onclick="deleteUser({{ $user->id }})" class="inline-flex items-center px-6 py-3 bg-red-100 text-red-700 rounded-xl hover:bg-red-200 transition duration-200">
                <i class="ri-delete-bin-line mr-2"></i>
                Delete User
            </button>
        @endif
        
        @if($user->role !== 'admin')
            <button onclick="toggleUserRole({{ $user->id }}, '{{ $user->role }}')" class="inline-flex items-center px-6 py-3 bg-purple-100 text-purple-700 rounded-xl hover:bg-purple-200 transition duration-200">
                <i class="ri-admin-line mr-2"></i>
                Make Admin
            </button>
        @endif
    </div>
</div>

<!-- JavaScript for User Actions -->
<script>
function toggleUserRole(userId, currentRole) {
    const newRole = currentRole === 'admin' ? 'user' : 'admin';
    const action = newRole === 'admin' ? 'make this user an admin' : 'remove admin privileges';
    
    if (confirm(`Are you sure you want to ${action}?`)) {
        // Here you would make an AJAX call to update the user role
        // For now, we'll just show an alert
        alert('User role update functionality needs to be implemented in the backend.');
    }
}

function deleteUser(userId) {
    if (confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
        // Redirect to delete route
        window.location.href = `/users/${userId}/delete`;
    }
}
</script>

@endsection
