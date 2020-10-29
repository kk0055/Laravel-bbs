<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Facades\Http;

class TwitterController extends Controller
{
    public function index(Request $request)
    {
        // ツイートを5件取得
   
        // $result = \Twitter::get('statuses/home_timeline/text',array("q" => "rainy", 'count' => 10));

        $results= \Twitter::get("search/tweets", array("q" => "rainy", 'count' => 10,));
      

        // $result= \Twitter::get("search/tweets", array("q" => "rainy", 'count' => 20));
       
        // $result= \Twitter::get("search/tweets", array("q" => "rainy", 'format' => 'array'));
        // $result= \ Twitter::get('search/tweets', 'GET', array('q' => '検索ワード', 'format' => 'array'));
      
        foreach ($results as $item);

         
    
//   dump($results);
        
// return view('twitter', [
//     "result" => $result
// ]);

         return view('twitter', compact('results'));
   
            //  $result['q']
   
    }
}