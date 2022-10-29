<?php

namespace App\Clients;

use Illuminate\Http\Client\Request;

class PluggyTransaction
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
     * Recupera as transações da conta
     */
    public function getTransactionsAccount($apiKey, $accountId)
    {

        try {

            $this->requestClient->post();

        } catch (\Throwable $t) {

        }

        return;
    }

    /**
     * @todo Metodo extra, analisar implementação
     */
    public function updateTransactionsAccount($apiKey, $transactionId, $categoryId)
    {
        return;
    }

}