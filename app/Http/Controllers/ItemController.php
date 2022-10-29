<?php

namespace App\Http\Controllers;

use App\Services\PluggyAuthService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * 
     */
    public function __construct(Request $request, PluggyAuthService $pluggyAuth)
    {
        $this->request = $request;
        $this->pluggyAuth = $pluggyAuth;
    }

    /**
     * 
     */
    public function createItem()
    {
        try {
            $apiKey = $this->pluggyAuth->getPluggyTokenAuth();

            return response()->json($apiKey);

        } catch (\Throwable $t) {
            return $t;
        }
    }
}
