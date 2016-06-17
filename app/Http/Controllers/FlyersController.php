<?php

namespace App\Http\Controllers;


use App\Http\Requests\ChangeFlyerRequest;
use App\Photo;
use App\Http\Requests\FlyerRequest;

use Illuminate\Http\Request;
use App\Flyer;
use App\Http\Requests;
use App\Http\Controllers\Controller;



class FlyersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);

        parent::__construct();
    }

    public function index()
    {
        $flyers = Flyer::latest('id')->get();

        return view('flyers.index', compact('flyers'));
    }


    public function create()
    {
        return view('flyers.create');
    }


    public function store(FlyerRequest $request)
    {


       $flyer = $this->user->publish(
           		new Flyer($request->all ())
            		);

        return redirect($flyer->zip.'/'.str_replace(' ', '-', $flyer->street));
    }


    public function show($zip, $street)
    {


        $flyer = Flyer::locatedAt($zip, $street);

        return view('flyers.show', compact('flyer'));

    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
