<?php

namespace App\Crm\User\Service;


use App\Crm\User\Requests\CreateUser;
use Crm\User\Events\UserCreation;
use Crm\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserService
{
    public function create (CreateUser $request): ?User
    {
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password=  Hash::make($request->password);
      $user->save();
      event(new UserCreation($user));
        return $user;
    }

    public function index (Request $request){
        return User::all();
    }
}
