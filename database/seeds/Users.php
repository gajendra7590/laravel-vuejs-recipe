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
            ['first_name'=>'Test','last_name'=>'User','email'=>'test@user.com','password'=>bcrypt('12345678'),'active'=>'1'],
        );


        foreach($userArray as $key => $user){
            $checkUser = User::where(['email'=>$user['email']])->first();
            if($checkUser==null){
                $createdUser = User::create($user);
            }
        }
    }
}
