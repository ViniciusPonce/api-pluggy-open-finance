<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Interfaces\AccountRepositoryInterface;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * 
     */
    public function __construct(Request $request, AccountRepositoryInterface $accountRepository)
    {
        $this->request = $request;
        $this->accountRepository = $accountRepository;
    }

    /**
     * 
     */
    public function getAccountsBusiness()
    {
        try {
            $response = $this->accountRepository->getAllUsersBusiness();

            return response()->json($response);

        } catch (\Throwable $t) {
            $response = ApiException::handler($t->getMessage(), $t->getCode());
            
            return response()->json($response);
        }
    }
}
