<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\User;
use App\models\Blogs;
use App\models\BlogCategories;
use App\models\BlogTagsSelected;
use App\models\BlogTags;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
{
    /*
     * Get Blogs List
     */
    public function getBlogList(Request $request){
        $get = $request->all();
        $page = ( isset($get['page']) && ($get['page'] > 0) )?intval($get['page']):1;
        $limit = 5;
        $offset = ( $page - 1 ) * $limit;
        $blogs = Blogs::with([
            'user' => function($q){ $q->select('id','first_name','last_name'); },
            'category' => function($q){ $q->select('id','name','slug'); },
            'selectedTags' => function($q){
                 $q->select('id','blog_id','tag_id')->with([
                     'tag' => function($q){ $q->select('id','name','slug'); },
                 ]);
            },
        ])
        ->where(['status' => '1'])
        ->orderBy('id','DESC')
        ->offset($offset)
        ->limit($limit)
        ->get()
        ->all();
        return response()->json([
            'status' => true,
            'total_counts' => $this->getBlogCounts($request,'1',0),
            'comments' => '1',
            'likes' => '1',
            'blogs' => $blogs,
        ]);
    }

    /*
     * Callback function for get counts
     */
    private function getBlogCounts($request,$type,$id = 0){
        switch ($type) {
            case "1":
                return Blogs::select('id')->where(['status' => '1'])->count();
                break;
            case "2":
                return Blogs::select('id')->where(['status' => '1'])->whereHas('selectedTags', function ($query) use ($id) {
                    $query->where([
                        'tag_id' => $id
                    ]);
                })->count();
                break;
            case "3":
                return Blogs::select('id')->where(['status' => '1','category_id' => $id])->count();
                break;
        }
    }

    /*
     * Get Blogs List By Tag
     */
    public function getBlogListByTags(Request $request,$slug){
        $tagModel = BlogTags::where(['status' => '1','slug' => $slug])->get()->first();
        if(!$tagModel){
            return response()->json([
                'status' => false,
                'message' => 'Invalid Tag'
            ]);
        }

        $get = $request->all();
        $page = ( isset($get['page']) && ($get['page'] > 0) )?intval($get['page']):1;
        $limit = 5;
        $offset = ( $page - 1 ) * $limit;
        $blogs = Blogs::with([
            'user' => function($q){ $q->select('id','first_name','last_name'); },
            'category' => function($q){ $q->select('id','name','slug'); },
            'selectedTags' => function($q){
                $q->select('id','blog_id','tag_id')->with([
                    'tag' => function($q){ $q->select('id','name','slug'); },
                ]);
            },
        ])
        ->where(['status' => '1'])
        ->whereHas('selectedTags', function ($query) use ($tagModel) {
            $query->where([
                'tag_id' => $tagModel->id
            ]);
        })
        ->orderBy('id','DESC')
        ->offset($offset)
        ->limit($limit)
        ->get()
        ->all();
        return response()->json([
            'status' => true,
            'total_counts' => $this->getBlogCounts($request,'2',$tagModel->id),
            'comments' => '1',
            'likes' => '1',
            'blogs' => $blogs,
        ]);

    }


    /*
     * Get Blogs List By Category
     */
    public function getBlogListByCategories(Request $request,$slug){
        $catModel = BlogCategories::where(['status' => '1','slug' => $slug])->get()->first();
        if(!$catModel){
            return response()->json([
                'status' => false,
                'message' => 'Invalid Category'
            ]);
        }

        $get = $request->all();
        $page = ( isset($get['page']) && ($get['page'] > 0) )?intval($get['page']):1;
        $limit = 5;
        $offset = ( $page - 1 ) * $limit;
        $blogs = Blogs::with([
            'user' => function($q){ $q->select('id','first_name','last_name'); },
            'category' => function($q){ $q->select('id','name','slug'); },
            'selectedTags' => function($q){
                $q->select('id','blog_id','tag_id')->with([
                    'tag' => function($q){ $q->select('id','name','slug'); },
                ]);
            },
        ])
        ->where(['status' => '1','category_id' => $catModel->id])
        ->orderBy('id','DESC')
        ->offset($offset)
        ->limit($limit)
        ->get()
        ->all();
        return response()->json([
            'status' => true,
            'total_counts' => $this->getBlogCounts($request,'3',$catModel->id),
            'comments' => '1',
            'likes' => '1',
            'blogs' => $blogs,
        ]);
    }

    /*
    * Get Blogs Detail on Single blog Page
    */
    public function getBlogDetail(Request $request,$slug){
        $blogModel = Blogs::where(['status' => '1','slug' => $slug])->get()->first();
        if(!$blogModel){
            return response()->json(['status' => false,'message' => 'Invalid Blog ID']);
        } else {
            return response()->json([
                'status' => true,
                'comments' => 0,
                'likes' => 0,
                'data' => Blogs::with([
                    'user' => function($q){ $q->select('id','first_name','last_name','photo','about_me'); },
                    'category' => function($q){ $q->select('id','name','slug'); },
                    'selectedTags' => function($q){
                        $q->select('id','blog_id','tag_id')->with([
                            'tag' => function($q){ $q->select('id','name','slug'); },
                        ]);
                    },
                ])
                ->where(['status' => '1','id' => $blogModel->id])
                ->get()
                ->first()
            ]);

        }


    }

    /*
    * Get Featured Blog List
    */
    public function getBlogFeatured(Request $request){
        $get = $request->all();
        $limit = ( isset($get['limit']) && ($get['limit'] > 0) )?intval($get['limit']):4;
        return Blogs::with([
            'user' => function($q){ $q->select('id','first_name','last_name'); },
            'category' => function($q){ $q->select('id','name','slug'); },
            'selectedTags' => function($q){
                $q->select('id','blog_id','tag_id')->with([
                    'tag' => function($q){ $q->select('id','name','slug'); },
                ]);
            },
        ])
        ->where(['status' => '1'])
        ->orderByRaw('RAND()','DESC')
        ->limit($limit)
        ->get()
        ->all();
    }

    /*
    * Get Sidebat Latest Blogs List
    */
    public function getBlogLatest(Request $request){
        $get = $request->all();
        $limit = ( isset($get['limit']) && ($get['limit'] > 0) )?intval($get['limit']):4;
        return Blogs::with([
            'user' => function($q){ $q->select('id','first_name','last_name'); },
            'category' => function($q){ $q->select('id','name','slug'); },
            'selectedTags' => function($q){
                $q->select('id','blog_id','tag_id')->with([
                    'tag' => function($q){ $q->select('id','name','slug'); },
                ]);
            },
        ])
        ->where(['status' => '1'])
        ->orderByRaw('RAND()','DESC')
        ->limit($limit)
        ->get()
        ->all();
    }

    /*
    * Get Blogs Instagram List
    */
    public function getBlogInstagrams(Request $request){
        $get = $request->all();
        $limit = ( isset($get['limit']) && ($get['limit'] > 0) )?intval($get['limit']):9;
        return Blogs::with([
            'user' => function($q){ $q->select('id','first_name','last_name'); },
            'category' => function($q){ $q->select('id','name','slug'); },
            'selectedTags' => function($q){
                $q->select('id','blog_id','tag_id')->with([
                    'tag' => function($q){ $q->select('id','name','slug'); },
                ]);
            },
        ])
        ->where(['status' => '1'])
        ->orderByRaw('RAND()','DESC')
        ->limit($limit)
        ->get()
        ->all();
    }

    /*
    * Get Blogs Top Categories List
    */
    public function getBlogCategories(Request $request){
        $get = $request->all();
        $limit = ( isset($get['limit']) && ($get['limit'] > 0) )?intval($get['limit']):7;
        $query = "(SELECT COUNT(id) 
            FROM blogs 
            WHERE (status = '1' AND category_id = blog_categories.id) 
            GROUP BY category_id) AS totalBlogs";
        return BlogCategories::select('*',DB::raw($query))
        ->where(['status' => '1'])
        ->limit($limit)
        ->get()
        ->all();
    }

    /*
    * Get Blogs Top Tags List
    */
    public function getBlogTags(Request $request){
        $get = $request->all();
        $limit = ( isset($get['limit']) && ($get['limit'] > 0) )?intval($get['limit']):10;
        return BlogTags::where(['status' => '1'])->limit($limit)->get()->all();
    }
}
