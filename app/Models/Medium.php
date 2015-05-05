<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medium extends Model
    {
    public $timestamps = false;
    public $table = 'medium';
    protected $fillable = array('medium');
        
    public function __construct()
        {
        parent::__construct();
        }
    }
    
