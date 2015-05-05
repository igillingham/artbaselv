<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Input;
use Validator;

class GalleriesController extends Controller
    {
    /*
      |--------------------------------------------------------------------------
      | Galleries Controller
      |--------------------------------------------------------------------------
      |
      | This controller renders the list of galleries
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
        $this->model = new Gallery();
        }

    /**
     * Show the galleries to the user.
     *
     * @return Response
     */
    public function index()
        {
        $galleries = $this->model->all();
        //dd($galleries);
        return view('galleries/list')->with('gallerylist', $galleries);
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id = null)
        {
        $gal = $this->model->find($id);
        //dd($gal);
        if (!$gal)
            {
            return Redirect::action('GalleriesController@index');
            }
        return view('galleries/update')->with('gal', $gal);
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
            'gallery_name' => 'required', // make sure the FE name field is not empty
            'street' => 'required',
            'town' => 'required'
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
            $galdata = array(
                'gallery_name'  => Input::get('gallery_name'),
                'street'        => Input::get('street'),
                'town'          => Input::get('town'),
                'postcode'      => Input::get('postcode')
            );
            if ($id)
               {
               $gallery = $this->model->find($id);
               if ($gallery)
                   {
                   $gallery->gallery_name = $galdata['gallery_name'];
                   $gallery->street = $galdata['street'];
                   $gallery->town = $galdata['town'];
                   $gallery->postcode = $galdata['postcode'];
                   $gallery->save();
                   }
               }
           }
        return Redirect::action('GalleriesController@index');
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
