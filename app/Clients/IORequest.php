<?php

namespace App\Clients;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class IORequest
{

    /**
     * 
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * 
     */
    public function get($baseUri, $uri, $data, $method = 'GET')
    {
        // dd('Tudo certo', $url, $data);
        return $this->request($baseUri, $uri, $data, $method);
        // return['Tudo certo', $uri, $data];
    }

    /**
     * 
     */
    public function post()
    {
        return;
    }

    /**
     * 
     */
    public function request($baseUri, $uri, $data, $method)
    {
        // dd($method);
        $client = new Client();
        $response = $client->request($method, 'https://api.github.com/users/VINICIUSPONCE');
        // $response = $client->get('https://api.github.com/users/VINICIUSPONCE',  [
        //     'debug' => TRUE,
        //     'timeout' => 100,
        //     'headers'=>[
        //         'Content-Type' => 'application/json'
        //         ]
        //     ]);
        return json_decode($response->getBody()->getContents());
    }
}