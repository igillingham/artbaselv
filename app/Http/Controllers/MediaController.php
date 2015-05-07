<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Medium;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Redirect;
use Input;
use Validator;

class MediaController extends Controller
    {
    /*
      |--------------------------------------------------------------------------
      | Media Controller
      |--------------------------------------------------------------------------
      |
      | This controller renders the list of media
      |
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
        {
        $this->middleware('auth');
        $this->model = new Medium();
        }

    /**
     * Show the media to the user.
     *
     * @return Response
     */
    public function index()
        {
        $media = $this->model->all();
        //dd($media);
        return view('media/list')->with('mediumlist', $media);
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id = null)
        {
        $medium = $this->model->find($id);
        //dd($gal);
        if (!$medium)
            {
            return Redirect::action('MediaController@index');
            }
        return view('media/update')->with('medium', $medium);
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id = null)
        {
        // validate the info, create rules for the inputs
        $rules = array(
                    'medium_name' => 'required', // make sure the Medium name field is not empty
                    );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails())
            {
            return redirect()->back()->withErrors($validator->errors());
            }
        else
            {
            $mediumdata = array(
                            'medium' => Input::get('medium_name'),
                            );
            //dd($id);
            if ($id)
               {
               $medium = $this->model->find($id);
               //dd($medium);
               if ($medium)
                   {
                   $medium->medium = $mediumdata['medium'];
                   $medium->save();
                   }
               }
            
            }
        return Redirect::action('MediaController@index');
        }

        
    public function create()
        {
        $medium = new Medium();
        //dd($gal);
        if (!$medium)
            {
            return Redirect::action('MediaController@index');
            }
        return view('media/update')->with('medium', null);
        }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
        {
        //
        }

    }
