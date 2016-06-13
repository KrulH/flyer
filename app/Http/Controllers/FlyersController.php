<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Http\Requests\FlyerRequest;
use Illuminate\Http\Request;

use App\Http\Requests;

class FlyersController extends Controller
{
    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street)->first();
        return view('flyers.show',compact('flyer'));
    }
    public function addPhoto($zip, $street,Request $request)
    {


         $file = $request->file('photo');
        $name = time().$file->getClientOriginalName();
        $file->move('flyer/photos',$name);
        $flyer = Flyer::locatedAt($zip, $street)->first();
        $flyer->photos()->create(['path' => "/flyer/photos/{$name}"]);
        return 'Done';
    }
    public function create()
    {
        //flash('Hello World', 'This is the message');
        return view('flyers.create');
    }
    public function store(FlyerRequest $request)
    {
        Flyer::create($request->all());
        flash()->success('Success!' , 'Your Flyer has beenb created');
        return redirect()->back();
    }
}
