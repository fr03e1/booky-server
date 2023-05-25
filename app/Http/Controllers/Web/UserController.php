<?php

namespace App\Http\Controllers\Web;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\User\UserCreateRequest;
use App\Http\Requests\Web\User\UserUpdateRequest;
use App\Models\User;

class UserController extends Controller
{
    public function __construct(protected User $user)
    {
        $this->middleware(  'auth:web');
    }

    public function index()
    {
        $users = $this->user::all();
        return view('user.index',compact('users'));
    }

    public function store(UserCreateRequest $request)
    {
        $data = $request->validated();
        $role_id = $request['role_id'] ?? RoleEnum::USER->id();
        unset($data['role_id']);

        $user =$this->user::firstOrCreate([
            'email'=>$data['email'],
        ],$data);

        $user->roles()->attach($role_id);
        return redirect()->route('user.index');
    }

    public function edit(User $user)
    {
        return view('user.edit',compact('user'));
    }

    public function update(UserUpdateRequest $request,User $user)
    {
        $data = $request->validated();
        $role_id = $data['role_id'];
        unset($data['role_id']);

        $user->update($data);
        $user->roles()->update(['role_id'=>$role_id]);

        return redirect()->route('user.show',compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }

    public function show(User $user)
    {
        return view('user.show',compact('user'));
    }
}
