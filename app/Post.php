<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded=['created_at','updated_at'];

    protected $date=[

        'published_at',

    ];


    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
