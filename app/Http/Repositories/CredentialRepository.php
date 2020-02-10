<?php

namespace App\Repositories;

use App\Credential;
use App\Repositories\Interfaces\ICredentialRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CredentialRepository implements ICredentialRepository
{
    /**
     * Store new credential
     *
     * @param $request
     */
    public function store($request)
    {
        Credential::create([
            'title' => $request->title,
            'username' => $request->username ?? '',
            'password' => Crypt::encryptString($request->password),
            'user_id' => $request->user_id,
        ]);
    }

    /**
     * Get user credentials by userId
     *
     * @param $userId
     * @return mixed
     */
    public function userVault($userId)
    {
        return Credential::where('user_id', '=', $userId)->get()->map(function ($user) {
            $user->password = Crypt::decryptString($user->password);
            return $user;
        });
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {
        return Credential::find($request->credential)->update([
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
        return Credential::find($id)->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return Credential::find($id)->get()->map(function ($user) {
            $user->password = Crypt::decryptString($user->password);
            return $user;
        })->first();
    }

    /**
     * @param $userId
     * @param $credential
     * @return bool
     */
    public function belongsTo($userId, $credential)
    {
        return Credential::findOrFail($credential)->user()->pluck('id')->first() === $userId;
    }
}