<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\GeneralSetting;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Redirect;
use App\Models\Post;
use App\Models\RequestForm;
use App\Models\User;

class PostController extends Controller
{
    public function addPost()
    {
        $data = [];
        $id = Auth::id();
        $data['user'] = Admin::where('id', $id)->first();
         $data['settings'] = GeneralSetting::where('id', "1")->first();
        $data['requestcontacts'] = RequestForm::orderBy('id','Desc')->limit(4)->get();
        $totalcontact = 0;
        if(!empty($data['requestcontacts'])){
            foreach($data['requestcontacts'] as $post){
                $totalcontact = $totalcontact + 1;
            }
        }
        $data['tcontact'] = $totalcontact;
        $data['comments'] = Comment::orderBy('id', 'Desc')->limit(4)->get();
        $totalcomment = 0;
        if (!empty($data['comments'])) {
            foreach ($data['comments'] as $post) {
                $totalcomment = $totalcomment + 1;
            }
        }
        $data['totalcomment'] = $totalcomment;
        $data['title'] = "Add Post";
        $data['category'] = Category::get();

        return view('admin.addPost')->with($data);
    }

    public function submitPost(PostRequest $request)
    {
        $id = Auth::id();
        $validated = $request->validated();
        
        $image = $this->uploadBlogImage($request);
        if ($image == 'failed') {
            $message = "sorry we are unable to upload your selected front cover image, please try  again";
            return $this->errorResponse($message);
        } elseif ($image == 'empty') {
            $image = null;
        }

        $videoName = $this->uploadBlogVideo($request);
        $v_status = "1";
        if ($videoName == 'failed') {
            $v_status = 0;
            $message = "sorry we are unable to upload your selected front cover video, please try  again";
            return back()->with('error',$message);
            
        } elseif ($videoName == 'empty') {
            $v_status = 0;
            $videoName = null;
        }    
       
        $po = new Blog();
        $po->image = $image;
        $po->video = $videoName;
        $po->v_status = $v_status;
        // $po->body = nl2br($request->input('body'));
        $po->body = $request->input('body');
        $po->category_id = $request->cid;
        $po->admin_id = $id;
        $po->name = $request->name;
        $po->trending = $request->trend;
        $po->slide = $request->slide;
        $po->status = $request->status;
        $po->slug = str::slug($request->name);
        $po->save();

        return back()->with('msg', 'Post created successfully');
    }

    public function trendingPost()
    {
        $data = [];
        $id = Auth::id();
        $data['user'] = Admin::where('id', $id)->first();
         $data['settings'] = GeneralSetting::where('id', "1")->first();
        $data['requestcontacts'] = RequestForm::orderBy('id','Desc')->limit(4)->get();
        $totalcontact = 0;
        if(!empty($data['requestcontacts'])){
            foreach($data['requestcontacts'] as $post){
                $totalcontact = $totalcontact + 1;
            }
        }
        $data['tcontact'] = $totalcontact;
        $data['comments'] = Comment::orderBy('id', 'Desc')->limit(4)->get();
        $totalcomment = 0;
        if (!empty($data['comments'])) {
            foreach ($data['comments'] as $post) {
                $totalcomment = $totalcomment + 1;
            }
        }
        $data['totalcomment'] = $totalcomment;
        $data['title'] = "Trending Post";
        $data['trending'] = Blog::where('trend', "1")->get();
        

        return view('admin.trending-post')->with($data);
    }

    public function featurePost()
    {
        $data = [];
        $id = Auth::id();
        $data['user'] = Admin::where('id', $id)->first();
         $data['settings'] = GeneralSetting::where('id', "1")->first();
        $data['requestcontacts'] = RequestForm::orderBy('id','Desc')->limit(4)->get();
        $totalcontact = 0;
        if(!empty($data['requestcontacts'])){
            foreach($data['requestcontacts'] as $post){
                $totalcontact = $totalcontact + 1;
            }
        }
        $data['tcontact'] = $totalcontact;
        $data['comments'] = Comment::orderBy('id', 'Desc')->limit(4)->get();
        $totalcomment = 0;
        if (!empty($data['comments'])) {
            foreach ($data['comments'] as $post) {
                $totalcomment = $totalcomment + 1;
            }
        }
        $data['totalcomment'] = $totalcomment;
        $data['title'] = "Features Post";
        $data['trending'] = Blog::where('feature', "1")->get();
        //$data['trending'] = Subcategory::select('subcategories.id')->join('posts','posts.cid', '=', 'subcategories.id')->get();

        return view('admin.feature-post')->with($data);
    }

    public function slidePost()
    {
        $data = [];
        $id = Auth::id();
        $data['user'] = Admin::where('id', $id)->first();
         $data['settings'] = GeneralSetting::where('id', "1")->first();
        $data['requestcontacts'] = RequestForm::orderBy('id','Desc')->limit(4)->get();
        $totalcontact = 0;
        if(!empty($data['requestcontacts'])){
            foreach($data['requestcontacts'] as $post){
                $totalcontact = $totalcontact + 1;
            }
        }
        $data['tcontact'] = $totalcontact;
        $data['comments'] = Comment::orderBy('id', 'Desc')->limit(4)->get();
        $totalcomment = 0;
        if (!empty($data['comments'])) {
            foreach ($data['comments'] as $post) {
                $totalcomment = $totalcomment + 1;
            }
        }
        $data['totalcomment'] = $totalcomment;
        $data['title'] = "Slide Post";
        $data['trending'] = Blog::where('slide', "1")->get();

        return view('admin.slide-post')->with($data);
    }

    public function managePost()
    {
        $data = [];
        $id = Auth::id();
        $data['user'] = Admin::where('id', $id)->first();
         $data['settings'] = GeneralSetting::where('id', "1")->first();
        $data['requestcontacts'] = RequestForm::orderBy('id','Desc')->limit(4)->get();
        $totalcontact = 0;
        if(!empty($data['requestcontacts'])){
            foreach($data['requestcontacts'] as $post){
                $totalcontact = $totalcontact + 1;
            }
        }
        $data['tcontact'] = $totalcontact;
        $data['comments'] = Comment::orderBy('id', 'Desc')->limit(4)->get();
        $totalcomment = 0;
        if (!empty($data['comments'])) {
            foreach ($data['comments'] as $post) {
                $totalcomment = $totalcomment + 1;
            }
        }
        $data['totalcomment'] = $totalcomment;
        $data['title'] = "All Post";
        $data['trending'] = Blog::get();

        return view('admin.allPost')->with($data);
    }

    public function pendingPost()
    {
        $data = [];
        $id = Auth::id();
        $data['user'] = Admin::where('id', $id)->first();
         $data['settings'] = GeneralSetting::where('id', "1")->first();
        $data['requestcontacts'] = RequestForm::orderBy('id','Desc')->limit(4)->get();
        $totalcontact = 0;
        if(!empty($data['requestcontacts'])){
            foreach($data['requestcontacts'] as $post){
                $totalcontact = $totalcontact + 1;
            }
        }
        $data['tcontact'] = $totalcontact;
        $data['comments'] = Comment::orderBy('id', 'Desc')->limit(4)->get();
        $totalcomment = 0;
        if (!empty($data['comments'])) {
            foreach ($data['comments'] as $post) {
                $totalcomment = $totalcomment + 1;
            }
        }
        $data['totalcomment'] = $totalcomment;
        $data['title'] = "All Pending Post";
        $data['trending'] = Blog::where('status',"pending")->get();

        return view('admin.allPendingPost')->with($data);
    }


    public function editPost($id)
    {
        $data = [];
        $uid = Auth::id();
        $data['user'] = Admin::where('id', $uid)->first();
         $data['settings'] = GeneralSetting::where('id', "1")->first();
        $data['requestcontacts'] = RequestForm::orderBy('id','Desc')->limit(4)->get();
        $totalcontact = 0;
        if(!empty($data['requestcontacts'])){
            foreach($data['requestcontacts'] as $post){
                $totalcontact = $totalcontact + 1;
            }
        }
        $data['tcontact'] = $totalcontact;
        $data['comments'] = Comment::orderBy('id', 'Desc')->limit(4)->get();
        $totalcomment = 0;
        if (!empty($data['comments'])) {
            foreach ($data['comments'] as $post) {
                $totalcomment = $totalcomment + 1;
            }
        }
        $data['totalcomment'] = $totalcomment;
        $data['title'] = "Edit  Post";
        $data['edits'] = Blog::where('id', $id)->first();
        $data['subcat'] = Category::where('id', $data['edits']->id)->first();
        $data['category'] = Category::get();

        return view('admin.editPost')->with($data);
    }

    public function updatePost(Request $request)
    {
        $id = Auth::id();
        $bid = $request->id;
        $po = Blog::where('id', $bid)->first();

        $image = $this->uploadBlogImage($request);
        if ($image == 'failed') {
            $message = "sorry we are unable to upload your selected front cover image, please try  again";
            return back()->with('error', $message);
        } elseif ($image == 'empty') {
            $image = $po->image;
        }
        
        $videoName = $this->uploadBlogVideo($request);
        $v_status = "1";
        if ($videoName == 'failed') {
            $v_status = "0";
            $message = "sorry we are unable to upload your selected front cover video, please try  again";
            return back()->with('error', $message);
        } elseif ($videoName == 'empty') {
            $v_status = "0";
            $videoName = $po->video;
        }
        

        if($po){
            $po->image = $image;
            $po->video = $videoName;
            $po->v_status = $v_status;
            // $po->body = nl2br($request->input('body'));
            $po->body = $request->input('content');
            $po->category_id = $request->cid;
            $po->admin_id = $id;
            $po->name = $request->name;
            $po->trending = $request->trend;
            $po->slide = $request->slide;
            $po->status = $request->status;
            $po->slug = str::slug($request->name);
            $po->save();
            return back()->with('msg', 'Post update successful');
        }else{
            return back()->with('error', 'Post update not successful');
        }
    }

    public function deletePost($id)
    {
        $check = Blog::where('id', $id)->first();
        if (\File::exists(public_path('upload/' . $check->image))) {
            \File::delete(public_path('upload/' . $check->image));
        } else {
            return back()->with('warning', 'File not found ');
        }
        Blog::where('id', $id)->delete();
        return back()->with('msg', 'Post deleted successfully ');
    }
}