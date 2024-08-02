<?php

namespace Database\Seeders;

use App\Models\Rayon;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRayonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Pastikan user dan rayon yang digunakan ada
        $user = User::find(1);
        if ($user) {
            // Debugging: cek ID rayon yang akan disinkronkan
            $rayonIds = [4, 6];
            $validRayons = Rayon::whereIn('id', $rayonIds)->pluck('id');
            echo "Valid rayon IDs: " . implode(', ', $validRayons->toArray()) . "\n";

            // Sinkronkan hanya dengan rayon yang valid
            $user->rayons()->sync($validRayons);
        } else {
            echo "User not found.";
        }
    }
}
