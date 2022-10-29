<?php

namespace App\Clients;

use Illuminate\Http\Client\Request;

class PluggyItem
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
    public function createConnectionBank($apiKey, $user, $password, $connectorId)
    {

        try {

            $this->requestClient->post();

        } catch (\Throwable $t) {

        }

        return;
    }

    /**
     * @todo implementar metodo para normalizar dados de retorno
     */
    public function normalizeData()
    {
        return;
    }

}