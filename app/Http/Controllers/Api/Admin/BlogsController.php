<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Validator;
use Webpatser\Uuid\Uuid;

use App\models\Blogs;
use App\models\BlogTags;
use App\models\BlogTagsSelected;


class BlogsController extends Controller
{

    /**
     * Function For Get All Blogs
     */
    public function getBlogs(Request $request)
    {
        $params = $request->all();
        $limit = (isset($params['limit']))?$params['limit']:5; 
        $page =  ( isset($params['page']) )?$params['page']:1;
        $offset = (( $page - 1 ) * $limit);

        $sort = (isset($params['sort']))?$params['sort']:'created_at';
        $direction = (isset($params['direction']))?$params['direction']:'desc';

        $search = (isset($params['search']))?$params['search']:'';

        $recipes = Blogs::with([
            'user' => function($model){ $model->select('id','display_name'); },
            'category' => function($model){ $model->select('id','name'); },
        ])
        ->select('id','category_id','user_id','title','slug','photo','status')
        ->orderBy($sort,$direction)
        ->offset($offset)
        ->orWhere('title', 'LIKE', '%'.$search.'%') 
        ->limit($limit)
        ->get()
        ->all(); 

        return [
            'total' => $this->getBlogsCount($request),
            'data' => $recipes
        ];
    }

    private function getBlogsCount(Request $request) {
        $params = $request->all();
        $search = (isset($params['search']))?$params['search']:'';
        return Blogs::select('*')
                ->orWhere('title', 'LIKE', '%'.$search.'%') 
                ->count();
    }

    public function editBlog(Request $request,$id)
    {
        return Blogs::with([
            'selectedTags' => function($model){ $model->select('id','blog_id','tag_id'); },
        ])
        ->where(['id' => $id])
        ->get()
        ->first();
    }


    public function createBlog(Request $request)
    {
        $post = $request->all();
        $validator = Validator::make($post,[
            'category_id' => 'required',
            'title' => 'required|unique:recipes',
            'short_desc' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'tags' => 'required|array|min:1',
        ],[
            'tags.*' => 'Please assign atliest one blog tag',
            'category_id.required' => 'Category field is required'
        ]); 

        if ($validator->fails()) {
            $result = errorArrayCreate( $validator->messages() );
            return response()->json([
                'status' => false,
                'message' => 'Incorrect form data',
                'errors' => $result
            ]);
        }else{
            $slug = slugCreator($post['title']);
            $blogModel = new Blogs();
            $blogModel->category_id = $post['category_id'];
            $blogModel->user_id = Auth::user()->id;
            $blogModel->title = $post['title'];
            $blogModel->short_desc = $post['short_desc'];
            $blogModel->slug = $slug;
            $blogModel->description = $post['description'];
            $blogModel->photo = NULL;
            $blogModel->status = $post['status'];
            //Upload Images
            if ($request->hasFile('image')) {
                $imageName = Uuid::generate().'.'.$request->image->getClientOriginalExtension();
                $is_uploaded = $request->image->move(public_path('images'), $imageName);
                if( $is_uploaded){
                    $blogModel->photo = $imageName;
                }
            }

            $save = $blogModel->save();
            if($save){
                $last_id = $blogModel->id;
                //Save Blog Tags
                if( isset($post['tags']) && count($post['tags']) > 0){
                    foreach ($post['tags'] as $tag){
                        $tagModel = new BlogTagsSelected();
                        $tagModel->blog_id = $last_id;
                        $tagModel->tag_id =  $tag;
                        $tagModel->status = '1';
                        $tagModel->save();
                    }
                }
                return response()->json([
                    'status' => true,
                    'message' => 'Blog added successfully'
                ]);
            }
        }
    }

    public function updateBlog(Request $request,$id){
        $blogModel = Blogs::find($id);
        if(!$blogModel){
            return response()->json([
                'status' => false,
                'message' => 'Invalid Blog ID'
            ]);
        }

        $post = $request->all();
        $validator = Validator::make($post,[
            'category_id' => 'required',
            'title' => 'required|unique:recipes',
            'short_desc' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png',
            'tags' => 'required|array|min:1',
        ],[
            'tags.*' => 'Please assign atliest one blog tag',
            'category_id.required' => 'Category field is required'
        ]);

        if ($validator->fails()) {
            $result = errorArrayCreate( $validator->messages() );
            return response()->json([
                'status' => false,
                'message '=> 'Incorrect form data',
                'errors' => $result
            ]);
        }else{
            $slug = slugCreator($post['title']);
            $blogModel->category_id = $post['category_id'];
            $blogModel->title = $post['title'];
            $blogModel->short_desc = $post['short_desc'];
            $blogModel->slug = $slug;
            $blogModel->description = $post['description'];
            $blogModel->status = $post['status'];
            //Upload Images
            if ($request->hasFile('image')) {
                $imageName = Uuid::generate().'.'.$request->image->getClientOriginalExtension();
                $is_uploaded = $request->image->move(public_path('images'), $imageName);
                if( $is_uploaded){
                    $blogModel->photo = $imageName;
                }
            }
            $save = $blogModel->save();
            if($save){
                $last_id = $blogModel->id;
                //Save Recipe Tags
                if( isset($post['tags']) && count($post['tags']) > 0){
                    foreach ($post['tags'] as $tag){
                        $find = BlogTagsSelected::where(['blog_id' => $last_id,'tag_id' => $tag])->get()->first();
                        if(!$find){
                            $tagModel = new BlogTagsSelected();
                            $tagModel->blog_id = $last_id;
                            $tagModel->tag_id =  $tag;
                            $tagModel->status = '1';
                            $tagModel->save();
                        }
                    }
                    //Delete If Any UnSelect
                    BlogTagsSelected::where('blog_id',$last_id)->whereNotIn('tag_id',$post['tags'])->delete();
                }
                return response()->json([
                    'status' => true,
                    'message' => 'Blog updated successfully'
                ]);
            }
        }

    }

    public function deleteBlog($id){
        $blogModel = Blogs::find($id);
        if(!$blogModel){
            return response()->json([
                'status' => false,
                'message' => 'Opps! this blog not found( Invalid ID )'
            ]);
        }

        $update = $blogModel->update(['status' => '2']);
        if($update){
            return response()->json([
                'status' => true,
                'message' => 'Blog archived successfully'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Opps! error in delete this blog.'
            ]);
        }
    }
}
