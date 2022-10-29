<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        Request $request,
        UserRepositoryInterface $userRepository,
        UserService $service,
        User $user
        )
    {
        $this->request = $request;
        $this->userRepository = $userRepository;
        $this->service = $service;
        $this->user = $user;
    }

    public function createUser()
    {
        try {
            $user = $this->request->all();

            if (empty($user)) {
                $message = 'Dados invalidos';

                throw new Exception($message, 400);
            }
            $this->user->fill($user);

            $response = $this->userRepository->create($this->user);

            return response()->json($response);

        } catch (\Throwable $t) {
            $response = ApiException::handler($t->getMessage(), $t->getCode());
            
            return response()->json($response);
        }
    }
}
