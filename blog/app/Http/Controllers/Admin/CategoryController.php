<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Comment;
use App\Models\GeneralSetting;
use App\Models\RequestForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function category()
    {
        $data = [];
        $id = Auth::id();
        $data['user'] = Admin::where('id', $id)->first();
        $data['title'] = "Category";
        $data['category'] = Category::get();
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

        return view('admin.category')->with($data);
    }
    public function submitCategory(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'cname' => ['required', 'string']
        ]);
        if ($validate->fails()) {
            return $this->errorResponse('Please fill up the empty space');
        } else {
            $cname = $request->cname;
            $status = $request->status;
            $slug = str::slug($cname);
            $id = Auth::id();
            $image = $request->image;
            $imagefile = time() . rand() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/');
            $image->move($destinationPath, $imagefile);

            $cat = new Category();
            $cat->name = $cname;
            $cat->status = $status;
            $cat->slug = $slug;
            $cat->admin_id = $id;
            $cat->banner = $imagefile;
            $cat->save();

            // $message = "Category Added Successfully";
            // return $this->successResponse($message);
            return back()->with('msg', 'Category Added Successfully');
        }
    }

    public function deleteCategory($id)
    {
        Category::where('id', $id)->delete();
        $message = "category deleted successfully";
        // return $this->successResponse($message);
        return back()->with('warning', 'Category Deleted Successfully');
    }

    public function editCategory($id)
    {
        $data = [];
        $id = Auth::id();
        $data['title'] = "Update Category";
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

        $data['category'] = Category::find($id);

        return view('admin.editCategory')->with($data);
    }

    public function updateCategory(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'cname' => ['required', 'string']
        ]);
        if ($validate->fails()) {
            return $this->errorResponse('Please fill up the empty space');
        } else {
            $cname = $request->cname;
            $cid = $request->cid;
            $status = $request->status;
            $slug = str::slug($cname);
            $id = Auth::id();


            $image = $request->image;
            $imagefile = time() . rand() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/');
            $image->move($destinationPath, $imagefile);

            $update = Category::where('id', $cid)->first();
            if ($update) {
                $update->name = $cname;
                $update->status = $status;
                $update->slug = $slug;
                $update->admin_id = $id;
                $update->banner = $imagefile;
                $update->save();
                return redirect()->route('category')->with('msg', 'Category updated Successfully');
            }
        }
    }
}
