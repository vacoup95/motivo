<?php

namespace App\Repositories\Interfaces;

interface IGroupRepository
{
    public function store($request);
    public function destroy($id);
    public function get($id);
    public function update($values, $id);
    public function removeUser($userId, $groupId);
    public function addUser($userMail, $groupId);
}