<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            Role::class,
            Users::class,
            CompanyDetail::class,
            RecipesCategories::class,
            RecipesTags::class,
            BlogCategories::class,
            BlogTags::class,
            Blogs::class
        ]);
    }
}
