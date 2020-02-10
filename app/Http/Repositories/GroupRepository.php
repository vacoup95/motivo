<?php

namespace App\Repositories;

use App\Group;
use App\Repositories\Interfaces\IGroupRepository;
use App\User;
use Illuminate\Support\Facades\Auth;

class GroupRepository implements IGroupRepository
{
    public function store($request)
    {
        $userId = Auth::user() ?? null;
        $group = Group::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $group->users()->attach($userId);
    }

    public function destroy($id)
    {
        return Group::find($id)->delete();
    }

    public function get($id)
    {
        return Group::find($id);
    }

    public function update($values, $id)
    {
        return Group::find($id)->update($values);
    }

    public function addUser($userMail, $groupId)
    {
        $user = User::where('email', '=', $userMail)->get();
        return Group::find($groupId)->users()->attach($user->pluck('id')->first());
    }
    public function removeUser($userId, $groupId)
    {
        return Group::find($groupId)->users()->detach($userId);
    }
}