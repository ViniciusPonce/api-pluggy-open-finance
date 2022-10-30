<?php

namespace App\Clients;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PluggyItem
{
    /**
     * 
     */
    public function __construct(Request $request, IORequest $requestClient)
    {
        $this->request = $request;
        $this->requestClient = $requestClient;
        $this->baseUrl = config('pluggy.api.url');
    }

    /**
     * Cria conexão com o banco que quer utilizar
     */
    public function createConnectionBank($user, $connectorId, $apiKey)
    {

        try {
            // dd($user->pass);
            $uri = config('pluggy.path.items');

            $dataClient = [
                'parameters' => [
                    'user' => 'user-ok',
                    'password' => 'password-ok'
                ],
                'connectorId' => (int) $connectorId,
            ];

            // dd($dataClient);
            return $this->requestClient->post($this->baseUrl, $uri, $dataClient, $apiKey);

        } catch (\Throwable $t) {
            // dd($t);
            throw new Exception("Falha na requisição", 400);
        }
    }

    /**
     * @todo implementar metodo para normalizar dados de retorno
     */
    public function normalizeData()
    {
        return;
    }

}