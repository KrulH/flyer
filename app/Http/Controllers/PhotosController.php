<?php

namespace App\Http\Controllers;

use App\AddPhotoToFlyer;
use App\Flyer;
use App\Http\Requests\ChangeFlyerRequest;
use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PhotosController extends Controller
{
    public function store($zip, $street, ChangeFlyerRequest $request)
    {
        $flyer = Flyer::locatedAt($zip, $street); // we find the flyer

        $photo = $request->file('photo'); // we store the photo which will be uploaded file instance

        // $photo = Photo::fromFile($request->file('photo')); bunu yapmak yerine dedicated class kullanacağız

        (new AddPhotoToFlyer($flyer, $photo))->save();




    }
}
