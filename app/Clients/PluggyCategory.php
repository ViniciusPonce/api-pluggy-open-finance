<?php

namespace App\Clients;

use Illuminate\Http\Client\Request;

class PluggyCategory 
{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function getCategories($apiKey)
    {
        dd('teste');
    }
}