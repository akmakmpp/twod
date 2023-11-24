<?php

namespace App\Http\Controllers;
use Goutte\Client;
use Illuminate\Http\Request;

class WebScrapController extends Controller
{
   
    
public  function scraper(){
    
   
$client = new Client();
$url = "https://www.set.or.th/en/home";
$page = $client->request(method:'GET',uri: $url );
$results = $page->filter(selector:'.col-xl-8')->each(function ($item){
 
 
    return explode(" ",$item->text());
 

});

// print_r($results[0]);

$set = $results[0][20];
$value = $results[0][23];
$first_value = $set[strlen($set) - 1];
$last_value = $value[strlen($value) - 4];

$time = $results[0][10];

return response()->json(['set' => $set,
'value'=>$value,
'result' => $first_value.$last_value,
'time' => $time
]);
} 


}
