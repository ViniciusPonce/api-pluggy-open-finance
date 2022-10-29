<?php

namespace App\Services;

use App\Models\User;
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

    public function checkExitAdmin(User $user)
    {

    }

    public function treatsPassword()
    {
        return $this->user->checkExist();
    }

}
