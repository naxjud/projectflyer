<?php

namespace App\Http\Controllers;

use Auth;
use App\Flyer;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\AuthorizesUsers;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FlyersController extends Controller
{
    use AuthorizesUsers;

    public function __construct(){
        $this->middleware('auth', ['except'=>['show']]);
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {

        return view('flyers.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(FlyerRequest $request)
    {

        //Validation wird im FlyerRequest gemacht

        Flyer::create($request->all());

        flash()->Success('Success','Your Flyer has been successfull saved in our DB');

        return redirect()->back(); //temporary
        //persist
        //redirect to a landing page
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street);

        return view('flyers.show', compact('flyer'));
    }


    public function addPhoto($zip, $street, Request $request){

        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,bmp'
        ]);


        if(! $this->userCreatedFlyer($request)){
            return $this->unauthorized($request);
        }

        $photo = $this->makePhoto($request->file('photo'));

        Flyer::locatedAt($zip, $street)->addPhoto($photo);

    }


        protected function makePhoto(UploadedFile $file){

            return Photo::named($file->getClientOriginalName())
            ->move($file);
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
