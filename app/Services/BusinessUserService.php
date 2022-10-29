<?php

namespace App\Services;

use App\Models\BusinessUser;
use Exception;

class BusinessUserService
{

    /**
     * 
     */
    public function __construct(BusinessUser $businessUser)
    {
        $this->businessUser = $businessUser;
    }

    public function checkDataBusiness(BusinessUser $businessUser)
    {
        if ($businessUser->checkIfExist()) {
            $message = 'E-mail ou CNPJ já cadastrado, verifique seus dados';

            return $this->handleException($message);
        }
        
        return true;
    }   

    private function handleException($message)
    {
        throw new Exception($message, 400);
    }
}