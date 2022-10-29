<?php

namespace App\Services;

use App\Clients\PluggyAuth as ClientPluggyAuth;

class PluggyAuthService
{

    /**
     * 
     */
    public function __construct(ClientPluggyAuth $pluggyAuth)
    {
        $this->pluggyAuth = $pluggyAuth;
    }

    /**
     * 
     */
    public function getPluggyTokenAuth()
    {
        return $this->pluggyAuth->getAuthenticateToken();
    }

    //implementar cache
}