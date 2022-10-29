<?php

namespace App\Clients;

use Illuminate\Http\Client\Request;

class PluggyAccount
{
    /**
     * 
     */
    public function __construct(Request $request, IORequest $requestClient)
    {
        $this->request = $request;
        $this->requestClient = $requestClient;
    }

    /**
     * Cria conexão com o banco que quer utilizar
     */
    public function getAccountItem($apiKey, $itemId)
    {

        try {

            $this->requestClient->post();

        } catch (\Throwable $t) {

        }

        return;
    }


}