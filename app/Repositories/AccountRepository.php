<?php

namespace App\Repositories;

use App\Interfaces\AccountRepositoryInterface;
use App\Models\User;

class AccountRepository implements AccountRepositoryInterface
{
    /**
     * 
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * 
     */
    public function getAllUsersBusiness()
    {
        $response = $this->user->where('type', User::OFFICE)->get();

        if (!$response) {
            throw new Exception("Nenhum cliente encontrado", 400);
        }
        
        return $response;
    }
}