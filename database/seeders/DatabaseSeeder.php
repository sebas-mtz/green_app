<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    
    public function run(): void
    {
        $roles = Role::factory(10)->create();
        
        User::factory(10)->create();
        User::factory(10)->create()->each(function($user) use($roles){
            $user->roles()->attach(
                $roles->random(rand(1,3))->pluck('id')->toArray() 
            );
        });  
    }
}
