<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Admin;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\GeneralSetting;
use App\Models\RequestForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function addContact(){
        $data = [];
        $data['title'] = "Add contact";
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

        return view('admin.addContact')->with($data);
    }
    public function manageContact()
    {
        $data = [];
        $data['title'] = "Add contact";
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
        $data['contact'] = Contact::get();

        return view('admin.manageContact')->with($data);
    }
    
    public function submitContact(ContactRequest $request)
    {
        $validated = $request->validated();
        
        $post = new Contact();
        $post->email = $validated['email'];
        $post->phone = $validated['phone'];
        $post->estatus = $request->estatus;
        $post->pstatus = $request->pstatus;
        $post->save();
        
        return back()->with('msg',"Record added successfully");
    }

    public function editContact($cid)
    {
        $data = [];
        $data['title'] = "Edit contact";
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
        $data['contact'] = Contact::where('id',$cid)->first();

        return view('admin.editContact')->with($data);
    }

    public function updateContact(ContactRequest $request)
    {
        $validated = $request->validated();
        $id = $request->id;
        $check = Contact::where('id', $id)->first();
        
        if($check){
            $check->email = $validated['email'];
            $check->phone = $validated['phone'];
            $check->estatus = $request->estatus;
            $check->pstatus = $request->pstatus;
            $check->save();

            return redirect()->route('manage.contact')->with('msg', "Record updated successfully");
        }else{
            return back()->with('error', "update not  successful");
        }
        
    }

    public function deleteContact($id)
    {
        Contact::destroy($id);
        return redirect()->route('manage.contact')->with('msg', "Record deleted successfully");
    }
    
}