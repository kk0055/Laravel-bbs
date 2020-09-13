<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;


class TwitterController extends Controller
{
    public function index(Request $request)
    {
        //ツイートを5件取得
   
        // $result = \Twitter::get('statuses/home_timeline');

      
        // return view('twitter', [
        //     "result" => $result
        // ]);

        // $result= \Twitter::get("search/tweets", array("q" => "rainy", 'count' => 20));
        $result= \Twitter::get("search/tweets", array("q" => "rainy", 'count' => 20));
        // $result= \Twitter::get("search/tweets", array("q" => "rainy", 'format' => 'array'));
        // $result= \ Twitter::get('search/tweets', 'GET', array('q' => '検索ワード', 'format' => 'array'));
      
        
     

        
         return view('twitter', compact('result'));
   
            //  $result['q']
   
    }
}