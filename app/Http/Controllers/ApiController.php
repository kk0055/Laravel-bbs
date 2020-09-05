<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function cat()
    {
        
        return view('api.cat');
    }

    public function dog()
    {
        
        return view('api.dog');
    }
}
