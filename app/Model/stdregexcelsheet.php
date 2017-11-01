<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class stdregexcelsheet extends Model
{
	//protected const table = "studentregistration";
    
    protected $fillable = array(
        'name','username','gender','class','level','session','term' 
    );


     protected $hidden = [
        'id', 'remember_token','created_at','updated_at'
    ];

}
