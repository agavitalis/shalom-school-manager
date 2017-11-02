<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
     protected $fillable = array(
        'name','current',
    );
}
