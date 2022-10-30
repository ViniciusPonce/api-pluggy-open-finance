<?php

namespace App\Services;

use App\Clients\PluggyItem;

class PluggyItemService
{


    /**
     * 
     */
    public function __construct(PluggyItem $pluggyItem)
    {
        $this->pluggyItemClient = $pluggyItem;
    }

    /**
     * 
     */
    public function processCreateItem($user, $connectorId, $apiKey)
    {
        $connectionData =  $this->pluggyItemClient->createConnectionBank($user, $connectorId, $apiKey);

        return $this->normalizeDataConnection($connectionData, $connectorId);
    }

    /**
     * 
     */
    private function normalizeDataConnection($connectionData, $connectorId)
    {
        $connection = [
            'nameBank' => $connectionData->connector->name,
            'itemId' => $connectionData->id,
            'idBank' => $connectorId,
            'status' => $connectionData->status,
            'executionStatus' => $connectionData->executionStatus,
            'error' => $connectionData->error ?? null,
            'latestUpdate' =>$connectionData->updatedAt
        ];

        return $connection;
    }

}