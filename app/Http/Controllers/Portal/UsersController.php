<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\Portal\UserService;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private UserService $service;

    public function __construct(UserService $userService)
    {
        $this->service = $userService;
        $this->middleware('auth:api', ['except' => ['register']]);
    }
    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserRequest $request) {
        $user = $this->service->register($request->all());

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    public function update(UserRequest $request, int $id)
    {
        return "ok";
        $user = $this->service->update($request->all(), $id);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

}
