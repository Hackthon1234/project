<?php
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

echo "=== Testing Auto-Increment Fix ===\n";

// Show current users
echo "Current users:\n";
$users = User::all();
foreach ($users as $user) {
    echo "ID: {$user->id}, Name: {$user->name}\n";
}

// Check SQLite sequence
$seq = DB::table('sqlite_sequence')->where('name', 'users')->first();
echo "Current SQLite sequence: " . ($seq ? $seq->seq : 'None') . "\n";

// Test the resetAutoIncrement method
echo "\n=== Testing resetAutoIncrement ===\n";

// Get the maximum ID
$maxId = User::max('id');
echo "Maximum user ID: {$maxId}\n";

// Reset auto-increment
try {
    if (DB::getDriverName() === 'sqlite') {
        if (!$maxId) {
            DB::table('sqlite_sequence')->where('name', 'users')->delete();
            echo "Deleted sequence entry (no users)\n";
        } else {
            $exists = DB::table('sqlite_sequence')->where('name', 'users')->exists();
            if ($exists) {
                DB::table('sqlite_sequence')
                    ->where('name', 'users')
                    ->update(['seq' => $maxId]);
                echo "Updated sequence to: {$maxId}\n";
            } else {
                DB::table('sqlite_sequence')->insert(['name' => 'users', 'seq' => $maxId]);
                echo "Created sequence entry with: {$maxId}\n";
            }
        }
    }
    
    // Check updated sequence
    $seq = DB::table('sqlite_sequence')->where('name', 'users')->first();
    echo "Updated SQLite sequence: " . ($seq ? $seq->seq : 'None') . "\n";
    
    // Now create a test user to see what ID it gets
    echo "\n=== Creating Test User ===\n";
    $testUser = User::create([
        'name' => 'Test User ' . time(),
        'email' => 'test' . time() . '@example.com',
        'password' => Hash::make('password123'),
        'role' => 'user'
    ]);
    
    echo "Test user created with ID: {$testUser->id}\n";
    echo "Expected ID should be: " . ($maxId + 1) . "\n";
    
    // Check final sequence
    $seq = DB::table('sqlite_sequence')->where('name', 'users')->first();
    echo "Final SQLite sequence: " . ($seq ? $seq->seq : 'None') . "\n";
    
    // Clean up test user
    $testUser->delete();
    echo "Test user deleted\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
