<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
        ]);

        DB::table('roles')->insert([
            'name' => 'user',
        ]);
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@transisi.id',
            'password' => bcrypt("transisi")
        ]);
        $user->roles()->attach(Role::where('name', 'admin')->first());
    }
}
