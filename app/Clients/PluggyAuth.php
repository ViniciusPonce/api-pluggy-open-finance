<?php

namespace App\Clients;

use Illuminate\Http\Request;
use App\Clients\IORequest;

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

            return $this->clientRequest->get($this->baseUrl, $uri, $dataClient);

        } catch (\Throwable $t) {

        }

        return ;
    }
}