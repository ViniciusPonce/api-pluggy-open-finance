<?php

namespace App\Clients;

use Illuminate\Http\Request;
use App\Clients\IORequest;
use Exception;

class PluggyAuth 
{

    /**
     * 
     */
    public function __construct(Request $request, IORequest $clientRequest)
    {
        $this->request = $request;
        $this->clientRequest = $clientRequest;
        $this->baseUrl = config('pluggy.api.url');
    }

    /**
     * 
     */
    public function getAuthenticateToken()
    {
        try {
            $uri = config('pluggy.path.auth');

            $dataClient = [
                'clientId' => config('pluggy.info.clientId'),
                'clientSecret' => config('pluggy.info.clientSecret')
            ];

            return $this->clientRequest->postAuth($this->baseUrl, $uri, $dataClient);

        } catch (\Throwable $t) {
            throw new Exception("Falha na requisição", 400);
        }

        return ;
    }
}