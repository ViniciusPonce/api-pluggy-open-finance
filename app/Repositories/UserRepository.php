<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserRepository implements UserRepositoryInterface
{

    /**
     * 
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function create(User $user)
    {
        $user->setHashPassword();

        $response = $user->save();

        if (!$response) {
            $status = [
                'message' => 'Falha ao cadastrar usuario, verifique seus dados',
                'code' => 400
            ];
            
            return $this->handleReturn($status);
        }

        return $this->handleReturn();
    }

    private function handleReturn($status = null, $response = null)
    {
        if (isset($status['code']) && $status['code'] != 200) {
            throw new Exception($status);
        }

        $sucess = [
            'message' => 'Usuario cadastrado com sucesso',
            'code' => 200
        ];

        return $sucess;
    }
}