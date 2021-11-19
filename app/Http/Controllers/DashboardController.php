<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Nette\Utils\DateTime;

class DashboardController extends Controller
{
    public function dashboard(){

        $recvWindow = 60000;
        $date = new DateTime();
        $queryString = "timestamp={$date->getTimestamp()}686&recvWindow={$recvWindow}";
        $signature = hash_hmac('sha256', $queryString, env('BINANCE_SECRET_KEY'));
        $queryStringFinal = "timestamp={$date->getTimestamp()}686&recvWindow={$recvWindow}&signature={$signature}";

        $apiEndpoint = '/sapi/v1/capital/config/getall';
        // $apiEndpoint = '/sapi/v1/system/status';
        $finalURL = "{$apiEndpoint}?{$queryStringFinal}";

        $headers = [
            'X-MBX-APIKEY' => env('BINANCE_API_KEY')
        ];
        $request = new  \GuzzleHttp\Psr7\Request('GET', $finalURL, $headers);
        // $promise = $client->sendAsync($request);

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => env('BINANCE_ENDPOINT'),
            // You can set any number of default request options.
            'timeout'  => 10.0,
        ]);
        $response = $client->send($request);
        $contents = json_decode($response->getBody()->getContents(), true);

        $validCoins = [];
        foreach($contents as $coin){
            if($coin['free'] != '0'){
                $validCoins[] = $coin;
            }
        }

        return view('dashboard', compact('validCoins'));
    }
}
