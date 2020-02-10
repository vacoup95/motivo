<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupStoreRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Repositories\Interfaces\IGroupRepository;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created group in storage.
     *
     * @param GroupStoreRequest $request
     * @param IGroupRepository $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(GroupStoreRequest $request, IGroupRepository $group)
    {
        $group->store($request);
        return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param IGroupRepository $group
     * @return \Illuminate\Http\Response
     */
    public function show($id, IGroupRepository $group)
    {

        return view('groups.show', [
            'group' => $group->get($id)
        ]);
    }


    /**
     * Update the group
     *
     * @param Request $request
     * @param $id
     * @param IGroupRepository $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(GroupUpdateRequest $request, $id, IGroupRepository $group)
    {
        $group->update($request->input(), $id);
        return Redirect()->back();
    }

    /**
     * Removes the group resource
     *
     * @param $id
     * @param IGroupRepository $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id, IGroupRepository $group)
    {
        $group->destroy($id);
        return Redirect()->back();
    }
}
