<?php

namespace App\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function create(User $user);
    public function findByCnpj($userOffice);
    public function updateLoginOffice(User $user, $userOffice);
    // public function acceptTerm();
}