<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\models\Categories as CatModel;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = array(
            ['name'=>'Juice','slug'=>'juice','description'=>'juice'],
            ['name'=>'Coffee','slug'=>'coffee','description'=>'coffee'],
            ['name'=>'Poha Jalebi','slug'=>'poha-jalebi','description'=>'poha jalebi'],
            ['name'=>'Salad','slug'=>'salad','description'=>'salad']
        );

        foreach($category as $cat){
            $checkCategory = CatModel::where(['name'=>$cat['name']])->first();
            if($checkCategory==null){
                CatModel::create($cat);
            }
        }
    }
}
