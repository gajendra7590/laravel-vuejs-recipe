<?php

use Illuminate\Database\Seeder;

//Models
use App\models\Blogs as BlogModel;
use App\models\BlogTags;
use App\models\BlogCategories;
use App\models\BlogTagsSelected;

class Blogs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogs = array([
                'category_id' => '1',
                'user_id' => '2',
                'title' => 'How to Make TikTok Cloud Bread Recipe',
                'slug' => 'how-to-make-tikTok-cloud-bread-recipe',
                'photo' => 'blog1.jpg',
                'short_desc' => 'How to Make TikTok Cloud Bread Recipe',
                'description' => 'If you’re on TikTok and you’ve looked under #cloudbread you’ve probably seen the fluffiest, 
                most impossible giant puffs of bread you’ve ever seen. All you need to make it is egg whites, sugar, and cornstarch. 
                Cloud bread is essentially a softly baked meringue with some rebranding',
                'status' => '1',
                'tagsList' => array([
                    'blog_id' => '1',
                    'tag_id' => '1'
                ],[
                    'blog_id' => '1',
                    'tag_id' => '2'
                ])
            ],
            [
                'category_id' => '1',
                'user_id' => '2',
                'title' => 'How to Make Cheesy Potato Balls',
                'slug' => 'how-to-make-cheesy-potato-balls',
                'photo' => 'blog2.jpg',
                'short_desc' => 'How to Make Cheesy Potato Balls',
                'description' => 'Croquettes are little stuffed balls or cylinders that are coated in breadcrumbs and deep-fried.
                          They’re usually made with béchamel or potatoes and can have a multitude of fillings. Croquettes are originally 
                          from France but nowadays they’re eaten almost everywhere. I love croquettes! 
                          There’s nothing better than mashed potatoes coated in crispy panko then deep fried to a satisfying golden crunch',
                'status' => '1',
                'tagsList' => array([
                    'blog_id' => '2',
                    'tag_id' => '3'
                ],[
                    'blog_id' => '2',
                    'tag_id' => '4'
                ],[
                    'blog_id' => '2',
                    'tag_id' => '6'
                ])
            ],
            [
                'category_id' => '1',
                'user_id' => '2',
                'title' => 'The Best Cajun Butter Steak Recipe',
                'slug' => 'the-best-cajun-butter-steak-recipe',
                'photo' => 'blog3.jpg',
                'short_desc' => 'The Best Cajun Butter Steak Recipe',
                'description' => 'This cajun butter steak is one of the best I’ve tried. The homemade cajun spices add just the right 
                amount of heat and savoriness without tasting like those bad cajun wings at the pub (although there’s a time and a 
                place for those). It’s both dry rubbed and marinated in oil for up to two days to pull out water and replace it with pure flavor. 
                If you are a salt and pepper evangelist, one bite of this steak will change your mind, I promise',
                'status' => '1',
                'tagsList' => array([
                    'blog_id' => '3',
                    'tag_id' => '4'
                ],[
                    'blog_id' => '3',
                    'tag_id' => '6'
                ],[
                    'blog_id' => '3',
                    'tag_id' => '8'
                ])
            ],
            [
                'category_id' => '1',
                'user_id' => '2',
                'title' => 'Sour Cream and Onion Pasta',
                'slug' => 'sour-cream-and-onion-pasta',
                'photo' => 'blog4.jpg',
                'short_desc' => 'Sour Cream and Onion Pasta',
                'description' => 'Do you have a favorite chip flavor? When I was a kid my absolute favorite was sour
                 cream and onion. Weird, I know. Everyone else around me was obsessed with barbecue or Doritos but for
                  me it was sour cream and onion all the way. Funny thing is, I haven’t had a sour cream and onion chip in a 
                  while. That is, until Mike and I were watching this YouTube show that we love. 
                  They did a giant snack bracket competition and the winning snack was sour cream and onion chips!',
                'status' => '1',
                'tagsList' => array([
                    'blog_id' => '4',
                    'tag_id' => '9'
                ],[
                    'blog_id' => '4',
                    'tag_id' => '10'
                ],[
                    'blog_id' => '4',
                    'tag_id' => '12'
                ])
            ],
            [
                'category_id' => '1',
                'user_id' => '2',
                'title' => 'How to Make the Best Japanese Shokupan Milk Bread',
                'slug' => 'how-to-make-the-best-japanese-shokupan-milk-bread',
                'photo' => 'blog5.jpg',
                'short_desc' => 'How to Make the Best Japanese Shokupan Milk Bread',
                'description' => 'If you know me, even a little bit, you would know that I love carbs. I have a sweatshirt 
                that proudly proclaims me a carb lover because it’s so very, very true. If I had my way and lived in a world where 
                calories didn’t count, I would happily live on carbs only, all day, 
                everyday. Give me ALL the carby foods: potatoes, noodles, rice, and oh yes, especially BREAD',
                'status' => '1',
                'tagsList' => array([
                    'blog_id' => '5',
                    'tag_id' => '9'
                ],[
                    'blog_id' => '5',
                    'tag_id' => '4'
                ],[
                    'blog_id' => '5',
                    'tag_id' => '6'
                ])
            ],
            [
                'category_id' => '1',
                'user_id' => '2',
                'title' => 'Small Batch Sourdough Focaccia',
                'slug' => 'small-batch-sourdough-focaccia',
                'photo' => 'blog6.jpg',
                'short_desc' => 'Small Batch Sourdough Focaccia',
                'description' => 'This is a recipe for a petite small batch sourdough focaccia, just 6 inches across.
                     It’s just the right amount for two or maybe even just one person who likes to eat bread. It’s crisp and fluffy, 
                     dimpled with pools of glossy olive oil and finished off with a generous snowing of flaky sea salt',
                'status' => '1',
                'tagsList' => array([
                    'blog_id' => '6',
                    'tag_id' => '3'
                ],[
                    'blog_id' => '6',
                    'tag_id' => '4'
                ],[
                    'blog_id' => '6',
                    'tag_id' => '6'
                ])
            ],
        );

        foreach ($blogs as $k => $blog){
            $model = BlogModel::where(['title' => $blog['title']])->get()->all();
            if(!$model){
                $blogTags = $blog['tagsList']; ;
                unset($blog['tagsList']);
                $bmodel = new BlogModel();
                $model = $bmodel->create($blog);
                if($model){
                    foreach ($blogTags as $btag){
                        $btagmodel = new BlogTagsSelected();
                        $btag['blog_id'] = $model->id;
                        $btagmodel->create($btag);
                    }
                }
            }
        }
    }
}
