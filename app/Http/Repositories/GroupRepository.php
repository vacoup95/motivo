<?php
namespace App\Repositories;

use App\Group;
use App\Repositories\Interfaces\IGroupRepository;
use Illuminate\Support\Facades\Auth;

class GroupRepository implements IGroupRepository
{
    public function store($parameters)
    {
        $user = Auth::user() ?? null;
        Group::create([
            'name' => $parameters->title,
            'description' => $parameters->description,
        ])->attach($user);
    }
}