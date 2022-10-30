<?php

namespace App\Interfaces;

interface PluggyItemRepositoryInterface
{
    public function create($item, $user);
}