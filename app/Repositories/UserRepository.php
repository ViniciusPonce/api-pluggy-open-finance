<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{

    /**
     * 
     */
    public function __construct(Request $request, User $user)
    {
        $this->request = $request;
        $this->user = $user;
    }

    public function create(User $user)
    {
        if ($user->hasPassword()) {
            $user->setHashPassword();
        }
        
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

    /**
     * 
     */
    public function findByCnpj($userOffice)
    {
        $user = $this->user->findByCnpj($userOffice);

        if (!$user) {
            $status = [
                'message' => 'Usuario não cadastrado pela associação',
                'code' => 400
            ];
            
            return $this->handleReturn($status);
        }

        

        

        return $user;
    }

    /**
     * 
     */
    public function updateLoginOffice(User $user, $userOffice)
    {
        // if (!$user->is_accept) {
        //     $status = [
        //         'message' => 'Os termos para cadastro não foram aceitos',
        //         'code' => 400
        //     ];
            
        //     return $this->handleReturn($status);
        // }

        $response = $user->update([
            'email' => $userOffice['email'],
            'crc' => $userOffice['crc'],
            'name' => $userOffice['accountant_name'],
            'password' => Hash::make($userOffice['password'])
        ]);

        if (!$response) {
            $status = [
                'message' => 'Falha ao cadastrar usuario, verifique seus dados',
                'code' => 400
            ];
            
            return $this->handleReturn($status);
        }

        return $this->handleReturn();
    }

    /**
     * 
     */
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

    // /**
    //  * 
    //  */
    // public function acceptTerm()
    // {

    // }
}