<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface IGroupCredentialRepository
{
    public function store($request);
    public function getCredentials($id);
    public function update(Request $request);
    public function destroy($id);
    public function get($id);
}