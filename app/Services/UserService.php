<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserService
{

    /**
     * 
     */
    public function __construct(Request $request, User $user)
    {
        $this->request = $request;
        $this->user = $user;
    }

    /**
     * 
     */
    public function validateTypeRegister(User $user)
    {
        
        $this->checkExist($user);

        return;
    }

    public function checkExist(User $user)
    {
        if ($user->getType() === User::OFFICE && $this->existOffice($user)) {
            $message = 'Cnpj ou razão social ja cadastrado(a), verifique seus dados';
            return $this->handleMessageError($message);
        }

        if ($user->getType() === User::ADMINISTRATOR && $this->existAdmin($user)) {
            $message = 'Usuário ja cadastrado(a), verifique seus dados';
            return $this->handleMessageError($message);
        }

        return;
    }

    /**
     * 
     */
    public function existAdmin(User $user)
    {
        return $this->user->checkExistAdmin($user);
    }

    /**
     * 
     */
    public function existOffice(User $user)
    {
        return $this->user->checkExistOffice($user);
    }

    /**
     * 
     */
    private function handleMessageError($message)
    {
        throw new Exception($message, 400);
    }

    /**
     * 
     */
    public function findOfficeConditions($userOffice)
    {

    }

}
