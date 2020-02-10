<?php

namespace App\Repositories;

use App\GroupCredential;
use App\Repositories\Interfaces\IGroupCredentialRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GroupCredentialRepository implements IGroupCredentialRepository
{
    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return GroupCredential::create([
            'title' => $request->title,
            'username' => $request->username ?? '',
            'password' => Crypt::encryptString($request->password),
            'group_id' => $request->group_id,
        ]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {
        return GroupCredential::find($request->group_credential)->update([
            'title' => $request->title,
            'username' => $request->username ?? '',
            'password' => Crypt::encryptString($request->password)
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return GroupCredential::find($id)->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return GroupCredential::find($id)->get()->map(function ($credential) {
            $credential->password = Crypt::decryptString($credential->password);
            return $credential;
        })->first();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCredentials($id)
    {
        return GroupCredential::where('group_id', '=', $id)->get()->map(function ($user) {
            $user->password = Crypt::decryptString($user->password);
            return $user;
        });
    }

}