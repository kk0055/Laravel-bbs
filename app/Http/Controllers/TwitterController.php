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
        // $result = \Twitter::get(array('q' => '#viernesdezapatillas since:2015-07-01 filter:images', 'count' => 10));
  
    // $response = $client->get('search/tweets.json', [
    //         'query' => ['q' => $query]
    //         ]);

    // $body = json_decode($response->getBody()->getContents(), true);
    // $statuses = array_get($body, 'statuses');
    // $tweet = array_fetch($statuses, 'text');


         return view('twitter', [
                "result" => $result,
    
            ]);
   
            //  $result['q']
   
    }
}