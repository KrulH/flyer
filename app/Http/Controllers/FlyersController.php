<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Http\Requests\FlyerRequest;
use Illuminate\Http\Request;

use App\Http\Requests;

class FlyersController extends Controller
{
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
