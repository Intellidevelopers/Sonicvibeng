<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertRequest;
use App\Http\Requests\PostRequest;
use App\Models\Admin;
use App\Models\Advertisement;
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

class AdvertController extends Controller
{
    public function addAdvert()
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
        $data['title'] = "Add Advert";
        $data['category'] = Category::get();

        return view('admin.addAdvert')->with($data);
    }

    public function submitAdvert(AdvertRequest $request)
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

        $po = new Advertisement();
        $po->banner = $image;
        $po->admin_id = $id;
        $po->title = $request->title;
        $po->position = $request->position;
        $po->content = nl2br($request->input('content'));
        $po->end_date = $request->end_date;
        $po->start_date = $request->start_date;
        $po->save();

        return back()->with('msg', 'Advert created successfully');
    }


    public function manageAdvert()
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
        $data['title'] = "All Advert";
        $data['adverts'] = Advertisement::get();

        return view('admin.manageAdvert')->with($data);
    }

    public function editAdvert($id)
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
        $data['title'] = "Edit  Advert";
        $data['advert'] = Advertisement::where('id', $id)->first();

        return view('admin.editAdvert')->with($data);
    }

    public function updateAdvert(AdvertRequest $request)
    {
        $id = Auth::id();
        $bid = $request->bid;
        $po = Advertisement::where('id', $bid)->first();

        $image = $this->uploadBlogImage($request);
        if ($image == 'failed') {
            $message = "sorry we are unable to upload your selected front cover image, please try  again";
            return $this->errorResponse($message);
        } elseif ($image == 'empty') {
            $image = $po->image;
        } else {
            if (\File::exists(public_path('upload/' . $po->image))) {
                \File::delete(public_path('upload/' . $po->image));
                $image = $image;
            } else {
                $image = $image;
            }
        }    

        if ($po) {
            $po->banner = $image;
            $po->admin_id = $id;
            $po->title = $request->title;
            $po->position = $request->position;
            $po->content = nl2br($request->input('content'));
            $po->end_date = $request->end_date;
            $po->start_date = $request->start_date;
            $po->save();
            return back()->with('msg', 'Advert update successful');
        } else {
            return back()->with('error', 'Advert update not successful');
        }
    }

    public function deleteAdvert($id)
    {
        $check = Advertisement::where('id', $id)->first();
        if (\File::exists(public_path('upload/' . $check->image))) {
            \File::delete(public_path('upload/' . $check->image));
        } else {
            return back()->with('warning', 'File not found ');
        }
        Advertisement::where('id', $id)->delete();
        return back()->with('msg', 'Post deleted successfully ');
    }
}