<?php
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\DB;

echo "=== Testing ID Reorganization ===\n";

// Show current users
echo "Current users:\n";
$users = User::all();
foreach ($users as $user) {
    echo "ID: {$user->id}, Name: {$user->name}\n";
}

// Check SQLite sequence
$seq = DB::table('sqlite_sequence')->where('name', 'users')->first();
echo "Current SQLite sequence: " . ($seq ? $seq->seq : 'None') . "\n";

// Test the reorganization logic
$users = User::orderBy('id')->get();
$needsReorganization = false;
foreach ($users as $index => $user) {
    if ($user->id != ($index + 1)) {
        $needsReorganization = true;
        echo "Gap found: User {$user->name} has ID {$user->id} but should be " . ($index + 1) . "\n";
    }
}

echo "Needs reorganization: " . ($needsReorganization ? 'YES' : 'NO') . "\n";

if ($needsReorganization) {
    echo "\n=== Performing reorganization ===\n";
    
    try {
        DB::beginTransaction();
        
        // For SQLite with foreign keys, we need to recreate the table
        echo "Starting SQLite table recreation approach...\n";
        
        // Step 1: Create a temporary users table with correct IDs
        DB::statement('CREATE TEMPORARY TABLE users_temp AS SELECT * FROM users ORDER BY id');
        echo "Created temporary table\n";
        
        // Step 2: Clear the original users table
        DB::table('users')->delete();
        echo "Cleared original users table\n";
        
        // Step 3: Insert users back with sequential IDs
        $tempUsers = DB::select('SELECT * FROM users_temp ORDER BY id');
        foreach ($tempUsers as $index => $user) {
            $newId = $index + 1;
            $originalId = $user->id;
            
            DB::table('users')->insert([
                'id' => $newId,
                'name' => $user->name,
                'email' => $user->email,
                'email_verified_at' => $user->email_verified_at,
                'password' => $user->password,
                'role' => $user->role,
                'remember_token' => $user->remember_token,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ]);
            
            echo "Inserted user {$user->name} with new ID {$newId} (was {$originalId})\n";
            
            // Update related tables
            if (DB::getSchemaBuilder()->hasTable('orders')) {
                $updated = DB::table('orders')->where('user_id', $originalId)->update(['user_id' => $newId]);
                if ($updated > 0) {
                    echo "Updated {$updated} orders for user {$user->name}\n";
                }
            }
            if (DB::getSchemaBuilder()->hasTable('carts')) {
                $updated = DB::table('carts')->where('user_id', $originalId)->update(['user_id' => $newId]);
                if ($updated > 0) {
                    echo "Updated {$updated} carts for user {$user->name}\n";
                }
            }
        }
        
        // Step 4: Drop the temporary table
        DB::statement('DROP TABLE users_temp');
        echo "Dropped temporary table\n";
        
        // Step 5: Update SQLite sequence
        $newSeq = count($tempUsers);
        $seqExists = DB::table('sqlite_sequence')->where('name', 'users')->exists();
        
        if ($seqExists) {
            DB::table('sqlite_sequence')
                ->where('name', 'users')
                ->update(['seq' => $newSeq]);
        } else {
            DB::table('sqlite_sequence')->insert(['name' => 'users', 'seq' => $newSeq]);
        }
        echo "Updated SQLite sequence to: {$newSeq}\n";
        
        DB::commit();
        echo "Transaction committed successfully!\n";
        
    } catch (Exception $e) {
        DB::rollback();
        echo "Error: " . $e->getMessage() . "\n";
        echo "Stack trace: " . $e->getTraceAsString() . "\n";
    }
    
    // Show final result
    echo "\n=== Final result ===\n";
    $users = User::all();
    foreach ($users as $user) {
        echo "ID: {$user->id}, Name: {$user->name}\n";
    }
    
    $seq = DB::table('sqlite_sequence')->where('name', 'users')->first();
    echo "Final SQLite sequence: " . ($seq ? $seq->seq : 'None') . "\n";
}
