<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role as RoleModel;
use Spatie\Permission\Models\Permission;



class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleArray = array(
            [
                'name' => 'admin'
            ],
            [
                'name' => 'author'
            ],
            [
                'name' => 'user',
            ],
        );

        foreach($roleArray as $key => $role){
            $checkUser = RoleModel::where(['name'=>$role['name']])->first();
            if($checkUser==null){
                $createdUser = RoleModel::create($role);
            }
        }
    }
}
