<?php

namespace App\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function create(User $user);
}