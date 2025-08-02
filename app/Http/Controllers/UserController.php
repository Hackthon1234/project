<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // Add admin middleware if you have one
        // $this->middleware('admin');
    }

    /**
     * Display a listing of users.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'nullable|string|in:admin,user'
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['role'] = $data['role'] ?? 'user';

        User::create($data);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified user.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'nullable|string|in:admin,user'
        ]);

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:8|confirmed'
            ]);
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user.
     */
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        // Prevent deleting the currently logged-in user
        if ($user->id === auth()->id()) {
            if ($request->expectsJson()) {
                return response()->json(['success' => false, 'error' => 'You cannot delete your own account.'], 403);
            }
            return redirect()->route('users.index')->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        // Just reset the auto-increment to prevent gaps in new user IDs
        // Non-sequential existing IDs are acceptable and more secure
        $this->resetAutoIncrement();

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'User deleted successfully.']);
        }

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    /**
     * Toggle user role between admin and user.
     */
    public function toggleRole($id)
    {
        $user = User::findOrFail($id);
        
        // Prevent changing own role
        if ($user->id === auth()->id()) {
            return response()->json(['error' => 'You cannot change your own role.'], 403);
        }

        $user->role = $user->role === 'admin' ? 'user' : 'admin';
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'User role updated successfully.',
            'new_role' => $user->role
        ]);
    }

    /**
     * Reset the auto-increment value for the users table.
     */
    private function resetAutoIncrement()
    {
        try {
            // Get the maximum ID from the users table
            $maxId = User::max('id');
            
            // SQLite doesn't support ALTER TABLE AUTO_INCREMENT
            // Instead, we update the sqlite_sequence table
            if (DB::getDriverName() === 'sqlite') {
                // If no users exist, delete the sequence entry to reset to 1
                if (!$maxId) {
                    DB::table('sqlite_sequence')->where('name', 'users')->delete();
                } else {
                    // Update the sequence to the maximum ID
                    DB::table('sqlite_sequence')
                        ->where('name', 'users')
                        ->update(['seq' => $maxId]);
                }
            } else {
                // MySQL/other databases
                $nextId = $maxId ? $maxId + 1 : 1;
                DB::statement("ALTER TABLE users AUTO_INCREMENT = {$nextId}");
            }
        } catch (\Exception $e) {
            // Silent fail - don't show errors to user
            Log::error('Failed to reset auto-increment: ' . $e->getMessage());
        }
    }

}
