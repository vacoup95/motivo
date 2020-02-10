<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupCredentialRequest;
use App\Repositories\Interfaces\IGroupCredentialRepository;
use Illuminate\Http\Request;

class GroupCredentialController extends Controller
{
    /**
     * CredentialController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user.group');
    }

    /**
     * @param Request $request
     * @param IGroupCredentialRepository $credentials
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, IGroupCredentialRepository $credentials)
    {
        return view('group-credentials.show', [
            'credential' => $credentials->get($request->group_credential)
        ]);
    }
    /**
     * @param GroupCredentialRequest $request
     * @param IGroupCredentialRepository $credentials
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(GroupCredentialRequest $request, IGroupCredentialRepository $credentials)
    {
        $credentials->store($request);
        return Redirect()->back();
    }

    /**
     * @param GroupCredentialRequest $request
     * @param IGroupCredentialRepository $credentials
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(GroupCredentialRequest $request, IGroupCredentialRepository $credentials)
    {
        $credentials->update($request);
        return Redirect()->back();
    }

    /**
     * @param Request $request
     * @param IGroupCredentialRepository $credentials
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, IGroupCredentialRepository $credentials)
    {
        $credentials->destroy($request->group_credential);
        return Redirect()->back();
    }
}
