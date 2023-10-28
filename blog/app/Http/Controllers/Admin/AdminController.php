<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Advertisement;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\GeneralSetting;
use App\Models\ReplyComment;
use App\Models\RequestForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = [];
        $data['title'] = "Admin Dashboard";
        $user = Auth::guard('admin')->user();
        $id = $user->id;
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

        $data['comments'] = Comment::orderBy('id', 'Desc')->limit(8)->get();
        $data['totalPost'] = $this->totalPost();
        $data['totaladvert'] = $this->totaladvert();
        $data['totalcontact'] = $this->totalcontact();
        $data['totalcategory'] = $this->totalcategory(); 
               

        
        return view('admin.adminDashboard')->with($data);
    }

private function totalPost(){
    $post = Blog::all();
    $totalPost = 0;
    foreach($post as $p){
        $totalPost = $totalPost + 1;
    }
    return $totalPost;
}
    private function totaladvert()
    {
        $advert = Advertisement::all();
        $totaladvert = 0;
        foreach ($advert as $p) {
            $totaladvert = $totaladvert + 1;
        }
        return $totaladvert;
    }
    private function totalcontact()
    {
        $contact = RequestForm::all();
        $totalcontact = 0;
        foreach ($contact as $p) {
            $totalcontact = $totalcontact + 1;
        }
        return $totalcontact;
    }
    private function totalcategory()
    {
        $category = Category::all();
        $totalcategory = 0;
        foreach ($category as $p) {
            $totalcategory = $totalcategory + 1;
        }
        return $totalcategory;
    }

    
    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('signin');
    }

    public function manageContactRequest()
    {
        $data = [];
        $data['title'] = "Admin Dashboard";
        $user = Auth::guard('admin')->user();
        $id = $user->id;
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
        $data['contacts'] = RequestForm::orderBy('id','Desc')->get();

        return view('admin.manageRequestForm')->with($data);
    }

    public function viewRequestForm($cid)
    {
        $data = [];
        $data['title'] = "Request form";
        $user = Auth::guard('admin')->user();
        $id = $user->id;
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
        $data['post'] = RequestForm::where('id', $cid)->first();
        if($data['post']){
            $data['post']->status = "read";
            $data['post']->save();
        }

        return view('admin.viewRequestForm')->with($data);
    }
    public function deleteRequestForm($id)
    {
       RequestForm::where('id', $id)->delete();
       return back()->with('msg','Record deleted successfully');
    }
    public function deletecomment($id)
    {
        Comment::where('id', $id)->delete();
        ReplyComment::where('comment_id',$id)->delete();
        return back()->with('msg', 'Record deleted successfully');
    }
    
}