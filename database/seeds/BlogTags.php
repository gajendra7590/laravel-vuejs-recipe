<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\models\BlogTags as Tags;

class BlogTags extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = array(
            ['name'=>'recipes','slug'=>'recipes','description'=>'recipes'],
            ['name'=>'food','slug'=>'food','description'=>'food'],
            ['name'=>'foodie','slug'=>'foodie','description'=>'foodie'],
            ['name'=>'foodporn','slug'=>'foodporn','description'=>'foodporn'],
            ['name'=>'cooking','slug'=>'cooking','description'=>'cooking'],
            ['name'=>'instafood','slug'=>'instafood','description'=>'instafood'],
            ['name'=>'recipe','slug'=>'recipe','description'=>'recipe'],
            ['name'=>'foodphotography','slug'=>'foodphotography','description'=>'foodphotography'],
            ['name'=>'homemade','slug'=>'homemade','description'=>'homemade'],
            ['name'=>'yummy','slug'=>'yummy','description'=>'yummy'],
            ['name'=>'healthyfood','slug'=>'healthyfood','description'=>'healthyfood'],
            ['name'=>'delicious','slug'=>'delicious','description'=>'delicious'],
            ['name'=>'foodblogger','slug'=>'foodblogger','description'=>'foodblogger'],
            ['name'=>'tasty','slug'=>'tasty','description'=>'tasty'],
            ['name'=>'easyrecipes','slug'=>'easyrecipes','description'=>'easyrecipes'],
            ['name'=>'healthy','slug'=>'healthy','description'=>'healthy'],
            ['name'=>'foodlover','slug'=>'foodlover','description'=>'foodlover'],
            ['name'=>'homecooking','slug'=>'homecooking','description'=>'homecooking'],
            ['name'=>'vegan','slug'=>'vegan','description'=>'vegan'],
            ['name'=>'healthylifestyle','slug'=>'healthylifestyle','description'=>'healthylifestyle'],
            ['name'=>'healthyrecipes','slug'=>'healthyrecipes','description'=>'healthyrecipes'],
            ['name'=>'dinner','slug'=>'dinner','description'=>'dinner'],
            ['name'=>'chef','slug'=>'chef','description'=>'chef'],
            ['name'=>'foodies','slug'=>'foodies','description'=>'foodies'],
            ['name'=>'instagood','slug'=>'instagood','description'=>'instagood'],
            ['name'=>'baking','slug'=>'baking','description'=>'baking'],
            ['name'=>'recipeoftheday','slug'=>'recipeoftheday','description'=>'recipeoftheday'],
            ['name'=>'breakfast','slug'=>'breakfast','description'=>'breakfast'],
            ['name'=>'bhfyp','slug'=>'bhfyp','description'=>'bhfyp'],
            ['name'=>'vegetarian','slug'=>'vegetarian','description'=>'vegetarian'],
            ['name'=>'dessert','slug'=>'dessert','description'=>'dessert'],
            ['name'=>'foodgasm','slug'=>'foodgasm','description'=>'foodgasm'],
            ['name'=>'indianfood','slug'=>'indianfood','description'=>'indianfood'],
            ['name'=>'nutrition','slug'=>'nutrition','description'=>'nutrition'],
            ['name'=>'healthyeating','slug'=>'healthyeating','description'=>'healthyeating'],
            ['name'=>'foodpics','slug'=>'foodpics','description'=>'foodpics'],
            ['name'=>'chocolate','slug'=>'chocolate','description'=>'chocolate'],
            ['name'=>'veganrecipes','slug'=>'veganrecipes','description'=>'veganrecipes'],
            ['name'=>'plantbased','slug'=>'plantbased','description'=>'plantbased']
        );

        foreach($tags as $tag){
            $checkTag = Tags::where(['name' => $tag['name']])->first();
            if(!$checkTag){
                Tags::create($tag);
            }
        }
    }
}
