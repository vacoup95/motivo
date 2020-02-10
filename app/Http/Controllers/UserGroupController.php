<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserToGroupRequest;
use App\Http\Requests\GroupRemoveUserRequest;
use App\Repositories\Interfaces\IGroupRepository;

class UserGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
    }

    /**
     * @param AddUserToGroupRequest $request
     * @param IGroupRepository $group
     */
    public function store(AddUserToGroupRequest $request, IGroupRepository $group)
    {
        $group->addUser($request->email, $request->group);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     */
    public function show($id)
    {

    }


    /**
     * Update the group
     *
     */
    public function update()
    {

    }

    /**
     * Remove user from group
     *
     * @param $userId
     * @param GroupRemoveUserRequest $request
     * @param IGroupRepository $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($userId, GroupRemoveUserRequest $request, IGroupRepository $group)
    {
        $group->removeUser($userId, $request->group ?? null);
        return Redirect()->back();
    }
}
