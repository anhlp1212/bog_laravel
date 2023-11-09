<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        $users = $this->userRepo->getAllOrderByDesc();
        return view('admin.users.users', ['users' => $users, 'title' => 'Users Management']);
    }

    public function detail($user_id)
    {
        $user = $this->userRepo->find($user_id);
        if ($user) {
            return view('admin.users.detail', ['user' => $user, 'title' => 'User Detail']);
        } else {
            return abort(404);
        }
    }
}
