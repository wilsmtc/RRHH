<?php

use Illuminate\Database\Seeder;
use App\Role;
class  UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* DB::table('users')->insert([
            'name' 		=> 'Artisan',
            'email' 	=> 'artisan@gmail.com',
            'password'	=> bcrypt('123456'),
            'type' 		=> 'member'
        ]);*/
        factory(App\User::class, 3)->create()->each(function ($u) {
                $u->posts()->save(factory(App\Role::class)->make());
            });
    // $users = factory(App\Permission::class, 20)
    //        ->create();
           
    }
}
