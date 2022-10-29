<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Interfaces\BusinessUserRepositoryInterface;
use App\Models\BusinessUser;
use App\Services\BusinessUserService;
use Illuminate\Http\Request;

class BusinessUserController extends Controller
{
    /**
     * 
     */
    public function __construct(
        Request $request,
        BusinessUserRepositoryInterface $businessRepository,
        BusinessUserService $businessService,
        BusinessUser $businessUser
        )
    {
        $this->request = $request;
        $this->businessRepository = $businessRepository;
        $this->businessService = $businessService;
        $this->businessUser = $businessUser;
    }

    /**
     * 
     */
    public function createBusinessUser()
    {
        try {
            $businessData = $this->request->all();

            $this->businessUser->fill($businessData);

            $this->businessService->checkDataBusiness($this->businessUser);

            $response = $this->businessRepository->create($this->businessUser);

            return response()->json($response);

        } catch (\Throwable $t) {
            $response = ApiException::handler($t->getMessage(), $t->getCode());
            
            return response()->json($response);
        }
    }
}
