<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Comment;
use App\Models\GeneralSetting;
use App\Models\RequestForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $data = [];
        $id = Auth::id();
        $data['user'] = Admin::where('id', $id)->first();
        $data['title'] = "Website Setting";
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

        return view('admin.settings')->with($data);
    }
    public function addSettings(Request $request)
    {
        $validate = Validator::make($request->all(), [
            // 'logo'=> ['required'],
            'about' => ['required'],
            'footer' => ['required'],
            //'status' => ['required'],
            'sitename' => ['required'],
             'copyright' => ['required'],
            'description' => ['required'],
             'address' => ['required'],
        ]);

        if ($validate->fails()) {
            return back()->with('error', 'Please fill up the empty space. Thank you');
        }
        $check = GeneralSetting::where('id', "1")->first();

        $logo = $this->uploadlogoImage($request);
        if ($logo == 'failed') {
            $message = "sorry we are unable to upload your selected front cover logo, please try  again";
            return back()->with('error',$message);
        } elseif ($logo == 'empty') {
            $logo = $check->logo;
        }

        // $logo = $request->logo;
        // $logofile = time() . rand() . '.' . $logo->getClientOriginalExtension();
        // $destinationPath = public_path('/upload');
        // $logo->move($destinationPath, $logofile);
        $favicon = $this->uploadfaviconImage($request);
        if ($favicon == 'failed') {
            $message = "sorry we are unable to upload your selected favicon image, please try  again";
            return back()->with('error', $message);
        } elseif ($favicon == 'empty') {
            $favicon = $check->favicon;
        }

        // $favicon = $request->favicon;
        // $faviconfile = time() . rand() . '.' . $favicon->getClientOriginalExtension();
        // $destinationPath = public_path('/upload');
        // $favicon->move($destinationPath, $faviconfile);


        GeneralSetting::where('id', "1")->update([
            'sitename' => $request->sitename,
            'description' => $request->description,
            'address' => $request->address,
            'copyright' => $request->copyright,
            'footer' => $request->footer,
            'about' => nl2br($request->input('about')),
            'link' => $request->link,
            'chatstatus' => $request->chatstatus,
        //     'logo' => $logofile,
        //    'favicon' => $faviconfile,
        ]);
        return back()->with('msg', 'Setting added succesfully');
    }

    public function edit()
    {
        $data = [];
        $id = Auth::id();
        $data['user'] = Admin::where('id', $id)->first();
        $data['title'] = "View Setting";
        $data['settings'] = GeneralSetting::get();

        return view('admin.edit-settings')->with($data);
    }

    public function delete()
    {
        $data = [];
        $id = Auth::id();
        $data['user'] = Admin::where('id', $id)->first();
        $data['title'] = "View Setting";
        $data['settings'] = GeneralSetting::get();

        return view('admin.edit-settings')->with($data);
    }

    public function changepassword()
    {
        $data = [];
        $id = Auth::id();
        $data['user'] = Admin::where('id', $id)->first();
        $data['title'] = "Change Password";
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

        return view('admin.changePassword')->with($data);
    }
    public function updateChangePassword(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'password' => 'required',
            'cpassword'=> 'required' 
        ]);
        if($validate->fails()){
            return back()->with('error',' Please fill up the empty space');
        }
        $password = $request->password;
        $cpassword = $request->cpassword;
        
        if($password != $cpassword){
            return back()->with('error', 'Password and Confirm password dont match ');
        }else{
            $id = Auth::id();
            Admin::where('id',$id)->update([
                'password'=> Hash::make($password)
            ]);
            return back()->with('msg', 'Password updated successfully ');
        }
        
    }
}