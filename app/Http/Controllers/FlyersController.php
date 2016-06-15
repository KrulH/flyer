<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Http\Requests\ChangeFlyerRequest;
use App\Photo;
use App\Http\Requests\FlyerRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;


class FlyersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['show']]);
        parent::__construct();
    }
    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street);
        return view('flyers.show',compact('flyer'));
    }
    public function addPhoto($zip, $street,ChangeFlyerRequest $request)
    {
//        $photo= $this->makePhoto($request->file('photo'));
        $photo = Photo::fromFile($request->file('photo'));
        Flyer::locatedAt($zip, $street)->addPhoto($photo);
    }

//    protected function makePhoto(UploadedFile $file)
//    {
//        return Photo::named($file->getClientOriginalName())->move($file);
//              // store idi
//    }
    public function create()
    {
        return view('flyers.create');
    }
    public function store(FlyerRequest $request)
    {
       $flyer = $this->user->publish(new Flyer($request->all()));
        flash()->success('Success!' , 'Your Flyer has been created');
        return redirect(flyer_path($flyer));
    }
}
