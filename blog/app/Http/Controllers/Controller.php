<?php

namespace App\Http\Controllers;

use App\Traits\UploadFiles;
use App\Traits\RequestResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, UploadFiles, RequestResponse;
}