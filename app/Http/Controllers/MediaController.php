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

        if (!$medium)
            {
            return Redirect::action('MediaController@index');
            }
        $action =   route('medium.update', ['id' => $id]);
        return view('media/update')->with(array('medium' => $medium, 'action'=>$action, 'is_new' => false));
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
            else
                {
                $medium = new Medium();
                if ($medium)
                   {
                   $medium->medium = $mediumdata['medium'];
                   $medium->save();
                   }
                
                }
            }
        return Redirect::action('MediaController@index');
        }

        
    public function show_create()
        {
        $action =   route('medium.update', ['id' => '0']);
        return view('media/create')->with(array('medium' => null, 'action'=>$action, 'is_new' => true));
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
