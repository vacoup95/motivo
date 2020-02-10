<?php

namespace App\Http\Middleware;

use App\GroupCredential;
use App\Repositories\Interfaces\IGroupCredentialRepository;
use Closure;

class CheckGroupBelongsToUser
{
    private $credential;

    public function __construct(IGroupCredentialRepository $credential)
    {
        $this->credential = $credential;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $groupId = $request->group ?? (isset($request->group_credential) ? GroupCredential::findOrFail($request->group_credential)->pluck('group_id')->first() : null);
        $user = Auth()->user();
        if($groupId !== null && in_array($groupId, $user->groups()->get()->pluck('id')->toArray()))
        {
            return $next($request);
        }
        return Redirect()->back();
    }
}
