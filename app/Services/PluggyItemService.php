<?php

namespace App\Services;

use App\Clients\PluggyItem as ClientPluggyItem;

class PluggyItemService
{


    /**
     * 
     */
    public function __construct(ClientPluggyItem $pluggyItem)
    {
        $this->pluggyItem = $pluggyItem;
    }

    /**
     * 
     */
    public function processCreateItem($userId, $user, $password, $connectorId, $apiKey)
    {
        $response = $this->pluggyItem->createConnectionBank($apiKey, $user, $password, $connectorId);
    }
}