<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Photo;
use App\Http\Requests\FlyerRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Http\Request;

use App\Http\Requests;


class FlyersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['show']]);
    }
    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street);
        return view('flyers.show',compact('flyer'));
    }
    public function addPhoto($zip, $street,Request $request)
    {
        $this->validate($request, [
            'photo' =>  'required|mimes:jpg,jpeg,png,bmp'
        ]);
        $photo= $this->makePhoto($request->file('photo'));
        Flyer::locatedAt($zip, $street)->addPhoto($photo);
    }
    protected function makePhoto(UploadedFile $file)
    {
        return Photo::named($file->getClientOriginalName())
            ->move($file);  // store idi

    }
    public function create()
    {
        return view('flyers.create');
    }
    public function store(FlyerRequest $request)
    {
        Flyer::create($request->all());
        flash()->success('Success!' , 'Your Flyer has beenb created');
        return redirect()->back();
    }
}
