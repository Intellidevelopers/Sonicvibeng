<?php
namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

trait UploadFiles{

    protected function uploadAdminProfileImage($request)
    {
        
        if ($request->hasFile('profile') && $request->file('profile')->isValid()){
            $imgName = Str::random(20);
            $extension =  strtolower($request->file('profile')->guessClientExtension());
            $photoName = $imgName.'.'.$extension;
            $fullpath = asset('upload').'/'.$photoName;

            $isMoved = Storage::disk('admin_profile_images')->put($photoName,file_get_contents($request->file('profile')));
            if($isMoved){
                return $photoName;
            }else{
                $photoName = "failed";
                return $photoName;
            }
        }else{
            $photoName = "empty";
            return $photoName;
        }
    }

    protected function uploadBlogImage($request)
    {
        
        if ($request->hasFile('image') && $request->file('image')->isValid()){
            $imgName = Str::random(20);
            $extension =  strtolower($request->file('image')->guessClientExtension());
            $photoName = $imgName.'.'.$extension;
            $destinationPath = public_path('/upload');

           $isMoved =  $request->file('image')->move($destinationPath, $photoName);
            if($isMoved){
                return $photoName;
            }else{
                $photoName = "failed";
                return $photoName;
            }
        }else{
            $photoName = "empty";
            return $photoName;
        }
    }

    protected function uploadBlogVideo($request)
    {

        if ($request->hasFile('video') && $request->file('video')->isValid()) {
            $video = $request->file('video');
            $videoPath = public_path('videos');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            
            $isMoved = $video->move($videoPath, $videoName);
            if ($isMoved) {
                return $videoName;
            } else {
                $videoName = "failed";
                return $videoName;
            }
        } else {
            $videoName = "empty";
            return $videoName;
        }

    }

    protected function uploadlogoImage($request)
    {

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $imgName = Str::random(20);
            $extension =  strtolower($request->file('logo')->guessClientExtension());
            $photoName = $imgName . '.' . $extension;
            $destinationPath = public_path('/upload');

            $isMoved =  $request->file('logo')->move($destinationPath, $photoName);
            if ($isMoved) {
                return $photoName;
            } else {
                $photoName = "failed";
                return $photoName;
            }
        } else {
            $photoName = "empty";
            return $photoName;
        }
    }
    protected function uploadfaviconImage($request)
    {

        if ($request->hasFile('favicon') && $request->file('favicon')->isValid()) {
            $imgName = Str::random(20);
            $extension =  strtolower($request->file('favicon')->guessClientExtension());
            $photoName = $imgName . '.' . $extension;
            $destinationPath = public_path('/upload');

            $isMoved =  $request->file('favicon')->move($destinationPath, $photoName);
            if ($isMoved) {
                return $photoName;
            } else {
                $photoName = "failed";
                return $photoName;
            }
        } else {
            $photoName = "empty";
            return $photoName;
        }
    }
   


}