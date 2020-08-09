<?php

use Illuminate\Database\Seeder;

//Model
use App\models\CompanyDetail as CompanyDetailModel;

class CompanyDetail extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = CompanyDetailModel::count();
        if(!$company) {
            $company = new CompanyDetailModel();
            $company->create([
                'company_name' => 'Onlne Recipe',
                'company_contact' => '1234567890',
                'company_email' => 'support@recipeonline.com',
                'company_logo' => '',
                'address_line_one' => '123,Recipe Online',
                'address_line_two'	=> 'Behind ABC TEST',
                'city'	=> 'City',
                'state' => 'State',
                'country'=> 'Country',
                'zip' => '12345',
                'website_url' => 'http://www.recipeonline.com',
                'youtube_url' => 'http://www.youtube.com',
                'facebook_url'	=> 'http://www.facebook.com',
                'twitter_url' => 'http://www.twitter.com',
                'linkedin_url'	=> 'http://www.linkedin.com',
                'instagram_url'	=> 'http://www.instagram.com',
                'pinterest_url'	=> 'http://www.pinterest.com',
                'telegram_url'	=> 'http://www.telegram.com',
                'about' => 'Onlne Recipe is the global world wide blog to provide all 
                           the recipe information to recipe lovers,it is freee.'
            ]);
        }
    }
}
