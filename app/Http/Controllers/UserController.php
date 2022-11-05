<?php

namespace App\Http\Controllers;

use App\Crm\User\Requests\CreateUser;
use App\Crm\User\Service\UserService;
use http\Env\Response;
use Illuminate\Http\Request;


class UserController extends Controller
{
    private UserService $userService;
    const TOKEN_NAME ='albertooo';

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

   public function create(CreateUser $request): \Illuminate\Http\JsonResponse
   {
    $user =$this->userService->create($request);
    return response()->json(
        [
            'user'=>$user,
            'token'=>$user->createToken(self::TOKEN_NAME)->plainTextToken
        ]
    );
   }

   public function index(Request $request): \Illuminate\Database\Eloquent\Collection
   {
     return $this->userService->index($request);
   }
}
