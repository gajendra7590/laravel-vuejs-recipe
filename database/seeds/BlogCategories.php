<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\models\BlogCategories as BCategories;

class BlogCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = array(
            ['name'=>'Breakfast','slug'=>'breakfast','description'=>'Breakfast'],
            ['name'=>'Brunch','slug'=>'brunch','description'=>'Brunch'],
            ['name'=>'Lunch','slug'=>'lunch','description'=>'Lunch'],
            ['name'=>'Dinner','slug'=>'dinner','description'=>'Dinner'],
            ['name'=>'Snacks','slug'=>'snacks','description'=>'Snacks'],
            ['name'=>'Appetisers','slug'=>'appetisers','description'=>'Appetisers'],
            ['name'=>'Soups','slug'=>'soups','description'=>'Soups'],
            ['name'=>'Salads','slug'=>'salads','description'=>'Salads'],
            ['name'=>'Sides','slug'=>'sides','description'=>'Sides'],
            ['name'=>'Pizza','slug'=>'pizza','description'=>'Pizza'],
            ['name'=>'Rice','slug'=>'rice','description'=>'Rice'],
            ['name'=>'Noodles','slug'=>'noodles','description'=>'Noodles'],
            ['name'=>'Pasta','slug'=>'pasta','description'=>'Pasta'],
            ['name'=>'Pies','slug'=>'pies','description'=>'Pies'],
            ['name'=>'Burgers','slug'=>'burgers','description'=>'Burgers'],
            ['name'=>'Mince','slug'=>'mince','description'=>'Mince'],
            ['name'=>'Sausages','slug'=>'sausages','description'=>'Sausages'],
            ['name'=>'Chicken','slug'=>'chicken','description'=>'Chicken'],
            ['name'=>'Turkey','slug'=>'turkey','description'=>'Turkey'],
            ['name'=>'Duck','slug'=>'duck','description'=>'Duck'],
            ['name'=>'Poultry','slug'=>'poultry','description'=>'Poultry'],
            ['name'=>'Pork','slug'=>'pork','description'=>'Pork'],
            ['name'=>'Lamb','slug'=>'lamb','description'=>'Lamb'],
            ['name'=>'Beef','slug'=>'beef','description'=>'Beef'],
            ['name'=>'Meat','slug'=>'meat','description'=>'Meat'],
            ['name'=>'Seafood','slug'=>'seafood','description'=>'Seafood'],
            ['name'=>'Stir Fry','slug'=>'stir-fry','description'=>'Stir Fry'],
            ['name'=>'Sauces','slug'=>'sauces','description'=>'Sauces']
        );

        foreach($category as $cat){
            $checkCategory = BCategories::where(['name'=>$cat['name']])->first();
            if($checkCategory==null){
                BCategories::create($cat);
            }
        }
    }
}
