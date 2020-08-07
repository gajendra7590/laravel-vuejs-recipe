<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\User;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Default Users
        $userArray = array(
            [
                'first_name'=>'Super',
                'last_name'=>'Admin',
                'display_name'=>'Super Admin',
                'email'=>'admin@recipe.com',
                'password'=>bcrypt('123456'),
                'role'=>'admin',
                'status'=>'1'
            ],
            [
                'first_name'=>'Author',
                'last_name'=>'Author',
                'display_name'=>'Author',
                'email'=>'author@recipe.com',
                'password'=>bcrypt('123456'),
                'role'=>'author',
                'status'=>'1'
            ],
            [
                'first_name'=>'User',
                'last_name'=>'User',
                'display_name'=>'User',
                'email'=>'user@recipe.com',
                'password'=>bcrypt('123456'),
                'role'=>'user',
                'status'=>'1'
            ],
        );


        foreach($userArray as $key => $user){
            $checkUser = User::where(['email'=>$user['email']])->first();
            if($checkUser == null){
                $role = $user['role'];
                unset($user['role']);
                $createdUser = User::create($user);
                $createdUser->assignRole($role);

            }
        }
    }
}
