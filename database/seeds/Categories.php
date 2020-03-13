<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\models\Categories as Cat;

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
            ['name'=>'Juice','slug'=>'juice','desc'=>'juice'],
            ['name'=>'Coffee','slug'=>'coffee','desc'=>'coffee'],
            ['name'=>'Poha Jalebi','slug'=>'poha-jalebi','desc'=>'poha jalebi'],
            ['name'=>'Salad','slug'=>'salad','desc'=>'salad']
        );

        foreach($category as $cat){
            $checkCategory = Cat::where(['name'=>$cat['name']])->first();
            if($checkCategory==null){
                Cat::create($cat);
            }
        }
    }
}
