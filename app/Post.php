<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   
    protected $fillable =[
    	'title','featured','slug','user_id'
    ];

    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }



}
