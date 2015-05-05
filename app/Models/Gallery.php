<?php

namespace App\Models;

class Gallery extends \Eloquent 
    {
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     * 
     */

    public $table = 'gallery';
    
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('gallery_name', 'street', 'town', 'postcode');
        
    public function __construct()
        {
        parent::__construct();
        }
        
     
    }