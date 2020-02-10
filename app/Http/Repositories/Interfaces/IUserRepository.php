<?php
namespace App\Repositories\Interfaces;

use App\User;

interface IUserRepository
{
    public function groups(User $user);
}