<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface ICredentialRepository
{
    public function store($request);
    public function userVault($userId);
    public function get($id);
    public function destroy($id);
    public function update(Request $request);
    public function belongsTo($userId, $credential);
}