<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Interfaces\PluggyItemRepositoryInterface;
use App\Services\PluggyAuthService;
use App\Services\PluggyItemService;
use Exception;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * 
     */
    public function __construct(
        PluggyAuthService $pluggyAuth,
        PluggyItemService $pluggyItemService,
        Request $request,
        PluggyItemRepositoryInterface $pluggyItemRepository
        )
    {
        $this->pluggyAuth = $pluggyAuth;
        $this->pluggyItemService = $pluggyItemService;
        $this->request = $request;
        $this->pluggyItemRepository = $pluggyItemRepository;
    }

    /**
     * 
     */
    public function createItem()
    {
        try {
            $connectorId = $this->request->input('connectorId');
            // dd(session());
            if (!auth()->check()) {
                throw new Exception("Não autorizado", 400);
            }

            $user = auth()->user();

            $apiKey = $this->pluggyAuth->getPluggyTokenAuth();

            $item = $this->pluggyItemService->processCreateItem($user, $connectorId, $apiKey);

            $response = $this->pluggyItemRepository->create($item, $user);

            return response()->json($response);

        } catch (\Throwable $t) {
            $response = ApiException::handler($t->getMessage(), $t->getCode());
            
            return response()->json($response);
        }
    }
}
