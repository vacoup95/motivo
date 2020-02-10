<?php

namespace App\Http\Middleware;

use App\Repositories\Interfaces\ICredentialRepository;
use Closure;

class CheckCredentialBelongsToUser
{
    private $credential;

    public function __construct(ICredentialRepository $credential)
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
        $userId = Auth()->user()->id;
        if($this->credential->belongsTo($userId, $request->credential)) {
            return $next($request);
        }
        return Redirect()->back();
    }
}
