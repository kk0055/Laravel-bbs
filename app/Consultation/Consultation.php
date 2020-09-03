<?php

namespace App\Consultation;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'title',
        'body',
        'cover_image',
    ];
    public function comment_to_consultations ()
    {
        return $this->hasMany('App\Consultation\Comment_to_consultation','post_id','id');
    }
}
