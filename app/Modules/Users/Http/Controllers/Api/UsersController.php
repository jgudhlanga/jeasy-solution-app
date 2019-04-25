<?php

namespace App\Modules\Users\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UsersController extends Controller
{
    public function stockData(Request $request)
    {
        $symbols = $request->all();
        $query = implode(',', $symbols);
        //$url = 'http://finance.google.com/finance/info?client=ig&q=NSE:'.$query;
        //$client = new Client(['base_uri'=> $url, 'timeout' => 2.0]);
        //$response = $client->request('GET');
        //\Log::info($response->getBody()->getContents());
        $stocks = [];
        foreach ($symbols as $symbol) {
            $stocks[$symbol] = [
              'name' => $symbol,
              'price' => rand(0, 10000)/10 - rand(0, 1000),
              'change' => rand(0, 100)/10 - rand(0, 10),
              'change_percentage' => rand(0, 100)/10 - rand(0, 10)
            ];
        }
        return $stocks;
    }
}


