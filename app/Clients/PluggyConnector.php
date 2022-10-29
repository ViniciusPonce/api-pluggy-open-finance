<?php

namespace App\Clients;

use Illuminate\Http\Client\Request;

class PluggyConector
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
    public function getListBank($apiKey, $sandbox = true)
    {

        try {

        } catch (\Throwable $t) {

        }
        return;
    }

}