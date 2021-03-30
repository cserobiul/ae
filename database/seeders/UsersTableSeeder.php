<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a Default User

        $user = User::where('email','apol@apol.com.bd')->first();

        if (is_null($user)){
            DB::table('users')->insert([
                'name' => 'Apol',
                'email' => 'apol@apol.com.bd',
                'password' => bcrypt('apol@apol.com.bd'),
            ]);
        }
    }
}
