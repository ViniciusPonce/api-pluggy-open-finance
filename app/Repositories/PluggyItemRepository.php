<?php

namespace App\Repositories;

use App\Interfaces\PluggyItemRepositoryInterface;
use App\Models\Item;
use Exception;

class PluggyItemRepository implements PluggyItemRepositoryInterface
{
    /**
     * 
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function create($itemData, $user)
    {
        $this->item->setUserId((string) $user->id);
        $this->item->setItemId($itemData['itemId']);
        $this->item->setNameBank($itemData['nameBank']);
        
        $response = $this->item->save();

        if (!$response) {
            throw new Exception("Falha ao salvar item", 400);
        }

        return $response;
    }   
}