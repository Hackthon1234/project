{{--
    =====================================================
    VybeCart - Users Management
    =====================================================
    Description: Admin panel to manage all users, roles, and permissions
    Author: VybeCart Team
    Last Modified: 2025-12-28
    =====================================================
--}}
@extends('layouts.app')
@section('title', 'Users')
@section('content')

<div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
    
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 tracking-tight">Users Management</h2>
        <div class="flex items-center gap-4">
            <a href="{{ route('users.create') }}" class="inline-flex items-center px-4 py-2 rounded-xl bg-gradient-to-r from-green-500 to-blue-600 text-white font-medium hover:shadow-md transition duration-200 hover:-translate-y-0.5">
                <i class="ri-user-add-line mr-2"></i>
                Add New User
            </a>
            <div class="inline-flex items-center px-4 py-2 rounded-xl bg-gradient-to-r from-indigo-50 to-blue-50 border border-indigo-200 text-indigo-700 text-sm font-semibold">
                <i class="ri-user-line mr-2"></i>
                <span data-user-count>{{ $users->count() }}</span> Users
            </div>
        </div>
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

    
    <div class="overflow-x-auto">
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gradient-to-r from-indigo-50 to-blue-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider w-16">ID</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">User Info</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider w-32">Role</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider w-32">Status</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider w-40">Registration Date</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider w-48">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                <tr class="hover:bg-blue-50/50 transition-colors duration-150" data-user-id="{{ $user->id }}">
                    
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="text-sm font-medium text-gray-900">#{{ $user->id }}</div>
                    </td>
                    
                    
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="ri-user-line text-xl text-indigo-600"></i>
                            </div>
                            <div class="min-w-0">
                                <div class="user-name text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                <div class="text-xs text-gray-500">{{ $user->email }}</div>
                                @if($user->email_verified_at)
                                    <div class="flex items-center text-xs text-green-600 mt-1">
                                        <i class="ri-check-line mr-1"></i>
                                        Email Verified
                                    </div>
                                @else
                                    <div class="flex items-center text-xs text-yellow-600 mt-1">
                                        <i class="ri-alert-line mr-1"></i>
                                        Email Not Verified
                                    </div>
                                @endif
                            </div>
                        </div>
                    </td>
                    
                    
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex justify-center">
                            <span class="role-badge inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                @if($user->role == 'admin') bg-purple-100 text-purple-800
                                @else bg-blue-100 text-blue-800
                                @endif">
                                <i class="{{ $user->role == 'admin' ? 'ri-admin-line' : 'ri-user-line' }} mr-1"></i>
                                {{ ucfirst($user->role ?? 'User') }}
                            </span>
                        </div>
                    </td>
                    
                    
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex justify-center">
                            <span class="px-3 py-1 text-xs rounded-full font-medium
                                @if($user->email_verified_at) bg-green-100 text-green-800
                                @else bg-yellow-100 text-yellow-800
                                @endif">
                                @if($user->email_verified_at) Active @else Pending @endif
                            </span>
                        </div>
                    </td>
                    
                    
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="text-sm text-gray-900">{{ $user->created_at->format('M d, Y') }}</div>
                        <div class="text-xs text-gray-500">{{ $user->created_at->format('h:i A') }}</div>
                    </td>
                    
                    
                    <td class="px-6 py-4">
                        <div class="flex justify-center gap-2">
                            <button onclick="toggleUserRole({{ $user->id }}, '{{ $user->role ?? 'user' }}')"
                               class="inline-flex items-center px-3 py-1.5 {{ $user->role === 'admin' ? 'bg-red-100 text-red-700 hover:bg-red-200' : 'bg-purple-100 text-purple-700 hover:bg-purple-200' }} text-xs font-medium rounded-lg transition-colors duration-150"
                               title="Toggle Admin Role">
                                <i class="{{ $user->role === 'admin' ? 'ri-user-line' : 'ri-admin-line' }} mr-1"></i>
                                {{ $user->role === 'admin' ? 'Remove Admin' : 'Make Admin' }}
                            </button>
                            
                            <button onclick="viewUserDetails({{ $user->id }})"
                               class="inline-flex items-center px-3 py-1.5 bg-blue-100 text-blue-700 text-xs font-medium rounded-lg hover:bg-blue-200 transition-colors duration-150"
                               title="View User Details">
                                <i class="ri-eye-line mr-1"></i>
                                View
                            </button>
                            
                            @if($user->id !== auth()->id())
                                <button onclick="deleteUser({{ $user->id }})"
                                   class="inline-flex items-center px-3 py-1.5 bg-red-100 text-red-700 text-xs font-medium rounded-lg hover:bg-red-200 transition-colors duration-150"
                                   title="Delete User">
                                    <i class="ri-delete-bin-line mr-1"></i>
                                    Delete
                                </button>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        @if($users->count() == 0)
            <div class="text-center py-12">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                    <i class="ri-user-line text-2xl text-gray-400"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No Users Found</h3>
                <p class="text-gray-500">Users will appear here once they register on your website.</p>
            </div>
        @endif
    </div>

    
    <div class="mt-8 grid grid-cols-1 sm:grid-cols-4 gap-4">
        <div class="bg-gradient-to-r from-indigo-50 to-blue-50 rounded-xl p-4 border border-indigo-200">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="ri-user-line text-indigo-600"></i>
                </div>
                <div>
                    <div class="text-sm text-gray-600">Total Users</div>
                    <div class="text-xl font-bold text-gray-900">{{ $users->count() }}</div>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-r from-purple-50 to-violet-50 rounded-xl p-4 border border-purple-200">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="ri-admin-line text-purple-600"></i>
                </div>
                <div>
                    <div class="text-sm text-gray-600">Admins</div>
                    <div class="text-xl font-bold text-gray-900">{{ $users->where('role', 'admin')->count() }}</div>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-4 border border-green-200">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="ri-check-line text-green-600"></i>
                </div>
                <div>
                    <div class="text-sm text-gray-600">Verified</div>
                    <div class="text-xl font-bold text-gray-900">{{ $users->whereNotNull('email_verified_at')->count() }}</div>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl p-4 border border-yellow-200">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="ri-time-line text-yellow-600"></i>
                </div>
                <div>
                    <div class="text-sm text-gray-600">Pending</div>
                    <div class="text-xl font-bold text-gray-900">{{ $users->whereNull('email_verified_at')->count() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
console.log('User management script loaded');

function toggleUserRole(userId, currentRole) {
    console.log('toggleUserRole called:', { userId, currentRole });
    const newRole = currentRole === 'admin' ? 'user' : 'admin';
    const action = newRole === 'admin' ? 'make this user an admin' : 'remove admin privileges';
    
    if (confirm(`Are you sure you want to ${action}?`)) {
        const roleButton = event.target.closest('button');
        const originalContent = roleButton.innerHTML;
        roleButton.innerHTML = '<i class="ri-loader-4-line mr-1 animate-spin"></i>Processing...';
        roleButton.disabled = true;
        
        fetch(`/users/${userId}/toggle-role`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                showToast(data.message, 'success');
                
                const roleBadge = document.querySelector(`[data-user-id="${userId}"] .role-badge`);
                
                if (data.new_role === 'admin') {
                    roleButton.className = 'inline-flex items-center px-3 py-1.5 bg-red-100 text-red-700 hover:bg-red-200 text-xs font-medium rounded-lg transition-colors duration-150';
                    roleButton.innerHTML = '<i class="ri-user-line mr-1"></i>Remove Admin';
                    roleButton.setAttribute('onclick', `toggleUserRole(${userId}, 'admin')`);
                    
                    if (roleBadge) {
                        roleBadge.className = 'role-badge inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800';
                        roleBadge.innerHTML = '<i class="ri-admin-line mr-1"></i>Admin';
                    }
                } else {
                    roleButton.className = 'inline-flex items-center px-3 py-1.5 bg-purple-100 text-purple-700 hover:bg-purple-200 text-xs font-medium rounded-lg transition-colors duration-150';
                    roleButton.innerHTML = '<i class="ri-admin-line mr-1"></i>Make Admin';
                    roleButton.setAttribute('onclick', `toggleUserRole(${userId}, 'user')`);
                    
                    if (roleBadge) {
                        roleBadge.className = 'role-badge inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800';
                        roleBadge.innerHTML = '<i class="ri-user-line mr-1"></i>User';
                    }
                }
                roleButton.disabled = false;
            } else {
                showToast(data.error || 'An error occurred while updating the user role.', 'error');
                roleButton.innerHTML = originalContent;
                roleButton.disabled = false;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('An error occurred while updating the user role. Check console for details.', 'error');
            roleButton.innerHTML = originalContent;
            roleButton.disabled = false;
            
            if (confirm('AJAX failed. Would you like to try a page refresh instead?')) {
                window.location.reload();
            }
        });
    }
}

function viewUserDetails(userId) {
    window.location.href = `/users/${userId}`;
}

function editUser(userId) {
    window.location.href = `/users/${userId}/edit`;
}

function deleteUser(userId) {
    console.log('deleteUser called:', { userId });
    const userRow = document.querySelector(`[data-user-id="${userId}"]`);
    const userName = userRow ? userRow.querySelector('.user-name')?.textContent || 'this user' : 'this user';
    
    if (confirm(`Are you sure you want to delete ${userName}? This action cannot be undone.`)) {
        const deleteButton = event.target.closest('button');
        const originalContent = deleteButton.innerHTML;
        deleteButton.innerHTML = '<i class="ri-loader-4-line mr-1 animate-spin"></i>Deleting...';
        deleteButton.disabled = true;
        
        fetch(`/users/${userId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                showToast(data.message || 'User deleted successfully.', 'success');
                if (userRow) {
                    userRow.style.transition = 'all 0.3s ease';
                    userRow.style.opacity = '0';
                    userRow.style.transform = 'translateX(-100%)';
                    setTimeout(() => userRow.remove(), 300);
                }
                updateUserCount();
            } else {
                showToast(data.error || 'Failed to delete user.', 'error');
                deleteButton.innerHTML = originalContent;
                deleteButton.disabled = false;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('An error occurred while deleting the user. Check console for details.', 'error');
            deleteButton.innerHTML = originalContent;
            deleteButton.disabled = false;
            
            if (confirm('AJAX failed. Would you like to try a page refresh instead?')) {
                window.location.reload();
            }
        });
    }
}

function showToast(message, type = 'success') {
    let toastContainer = document.getElementById('toast-container');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.id = 'toast-container';
        toastContainer.className = 'fixed top-4 right-4 z-50 space-y-2';
        document.body.appendChild(toastContainer);
    }
    
    const toast = document.createElement('div');
    const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
    const icon = type === 'success' ? 'ri-check-circle-line' : 'ri-error-warning-line';
    
    toast.className = `${bgColor} text-white px-6 py-3 rounded-xl shadow-lg flex items-center transform translate-x-full transition-transform duration-300 max-w-md`;
    toast.innerHTML = `
        <i class="${icon} mr-2"></i>
        <span>${message}</span>
        <button onclick="this.parentElement.remove()" class="ml-4 text-white hover:text-gray-200">
            <i class="ri-close-line"></i>
        </button>
    `;
    
    toastContainer.appendChild(toast);
    
    setTimeout(() => {
        toast.classList.remove('translate-x-full');
    }, 100);
    
    setTimeout(() => {
        if (toast.parentElement) {
            toast.classList.add('translate-x-full');
            setTimeout(() => toast.remove(), 300);
        }
    }, 5000);
}

function updateUserCount() {
    const userCountElements = document.querySelectorAll('[data-user-count]');
    userCountElements.forEach(element => {
        const currentCount = parseInt(element.textContent);
        element.textContent = currentCount - 1;
    });
}
</script>

@endsection
