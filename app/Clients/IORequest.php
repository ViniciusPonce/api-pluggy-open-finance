<?php

namespace App\Clients;

use Exception;
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
    public function postAuth($baseUri, $uri, $data, $method = 'POST')
    {
        return $this->requestAuth($baseUri, $uri, $data, $method);
    }

    /**
     * 
     */
    public function post($baseUri, $uri, $data, $apiKey, $method = "POST")
    {
        return $this->request($baseUri, $uri, $apiKey, $data, $method);
    }

    /**
     * 
     */
    public function requestAuth($baseUri, $uri, $data, $method)
    {
        $ch = curl_init();
        curl_setopt_array($ch, [
          CURLOPT_URL => $baseUri.$uri,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => $method,
          CURLOPT_POSTFIELDS => json_encode($data, true),
          CURLOPT_HTTPHEADER => [
            "accept: application/json",
            "content-type: application/json"
          ],
        ]);

        $response = curl_exec($ch);

        $error = curl_error($ch);

        if ($error) {
            return;
        }

        return json_decode($response);
    }

    /**
     * 
     */
    public function request($baseUri, $uri, $apiKey, $data, $method)
    {
        $ch = curl_init();
        curl_setopt_array($ch, [
          CURLOPT_URL => $baseUri.$uri,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => $method,
          CURLOPT_POSTFIELDS => json_encode($data, true),
          CURLOPT_HTTPHEADER => [
            "X-API-KEY:" . $apiKey->apiKey,
            "accept: application/json",
            "content-type: application/json"
          ],
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);

        if ($error) {
            return;
        }

        return json_decode($response);
    }
}