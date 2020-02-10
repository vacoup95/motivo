<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreCredentialRequest;
use App\Repositories\Interfaces\ICredentialRepository;
use Illuminate\Http\Request;

class CredentialController extends Controller
{
    /**
     * CredentialController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user.credential')->only(['destroy', 'show', 'update']);
    }

    /**
     * @param UserStoreCredentialRequest $request
     * @param ICredentialRepository $credentials
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserStoreCredentialRequest $request, ICredentialRepository $credentials)
    {
        $credentials->store($request);
        return Redirect()->back();
    }

    /**
     * @param Request $request
     * @param ICredentialRepository $credentials
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, ICredentialRepository $credentials)
    {
        return view('credentials.show', [
            'credential' => $credentials->get($request->credential)
        ]);
    }

    /**
     * @param Request $request
     * @param ICredentialRepository $credentials
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, ICredentialRepository $credentials)
    {
        $credentials->update($request);
        return Redirect()->back();
    }

    /**
     * @param Request $request
     * @param ICredentialRepository $credentials
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, ICredentialRepository $credentials)
    {
        $credentials->destroy($request->credential);
        return Redirect()->back();
    }
}
