<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\IUserRepository;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param IUserRepository $user
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(IUserRepository $user)
    {
        $groups = $user->groups(User::find(Auth::user()->id));
        return view('home', [
            'groups' => $groups,
        ]);
    }
}
