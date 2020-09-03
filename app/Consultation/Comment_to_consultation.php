<?php

namespace App\Consultation;

use Illuminate\Database\Eloquent\Model;

class Comment_to_consultation extends Model
{
    protected $fillable = [
        'body',
    ];

    public function consultation()
    {
        return $this->belongsTo('App\Consultation\Consultation','post_id');
    }
}
