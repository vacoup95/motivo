<?php
namespace App\Repositories;

use App\Repositories\Interfaces\IUserRepository;
use App\User;

class UserRepository implements IUserRepository
{
    public function groups(User $user)
    {
        if($user->id) {
            return User::find($user->id)->groups()->get();
        }
        return new User();
    }
}