<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Comment;
use App\Models\GeneralSetting;
use App\Models\Quote;
use App\Models\RequestForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class QuoteController extends Controller
{
    public function Quote()
    {
        $data = [];
        $id = Auth::id();
        $data['user'] = Admin::where('id', $id)->first();
        $data['title'] = "Quote";
        $data['quote'] = Quote::get();
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

        return view('admin.addQuote')->with($data);
    }
    public function submitQuote(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string']
        ]);
        if ($validate->fails()) {
            return $this->errorResponse('Please fill up the empty space');
        } else {
            $name = $request->name;

            $cat = new Quote();
            $cat->name = $name;
            $cat->save();
            return back()->with('msg', 'Quote Added Successfully');
        }
    }

    public function deleteQuote($id)
    {
        Quote::where('id', $id)->delete();
        return back()->with('warning', 'Quote Deleted Successfully');
    }

    public function editQuote($id)
    {
        $data = [];
        $id = Auth::id();
        $data['title'] = "Update Quote";
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

        $data['quote'] = Quote::find($id);

        return view('admin.editQuote')->with($data);
    }

    public function updateQuote(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required']
        ]);
        if ($validate->fails()) {
            return redirect()->route('quote')->with('msg', 'Please fill up the empty space');
        } else {
            $name = $request->name;

            $id = $request->id;

            $update = Quote::where('id', $id)->first();
            if ($update) {
                $update->name = $name;
                $update->save();
                return redirect()->route('quote')->with('msg', 'Quote updated Successfully');
            }
        }
    }
}