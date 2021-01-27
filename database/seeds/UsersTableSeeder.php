<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.tes',
            'password' => bcrypt(12345678)
        ]);

        $author = User::create([
            'name' => 'author',
            'email' => 'author@mail.tes',
            'password' => bcrypt(12345678)
        ]);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@mail.tes',
            'password' => bcrypt(12345678)
        ]);

        $admin->roles()->attach($adminRole);
        $admin->roles()->attach($authorRole);
        $admin->roles()->attach($userRole);

        factory(User::class, 25)->create();
    }
}
