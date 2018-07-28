<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignIn;
use App\Http\Requests\SignUp;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use App\Services\UsersService;
use Illuminate\Support\Facades\Storage;

class PassportController extends Controller
{
    private $repository;
    /**
     * PassportController constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param SignIn $request
     * @return mixed
     * @response {
     *      "error" : {
     *             "status":false,
     *             "message":""
     *      },
     *      "data":{
     *          "user":{
     *              "id":27,
     *              "email":"fake@mail.com",
     *              "avatar":"AVATAR_URL"},
     *          "token":"access_token"
     *     }
     *}
     */
    public function signIn(SignIn $request) {
        $user = (new UsersService(Storage::disk('public'), $this->repository))->signIn($request);
        return response()->success([
            'user' => new UserResource($user),
            'token' => $user->createToken('api')->accessToken
        ]);
    }

    /**
     * @param SignUp $request
     * @return mixed
     * @response {
     *      "error" : {
     *             "status":false,
     *             "message":""
     *      },
     *      "data":{
     *          "user":{
     *              "id":27,
     *              "email":"fake@mail.com",
     *              "avatar":"AVATAR_URL"},
     *          "token":"access_token"
     *     }
     *}
     */
    public function signUp(SignUp $request) {
        $user = (new UsersService(Storage::disk('public'), $this->repository))->signUp($request);
        return response()->success([
            'user' => new UserResource($user),
            'token' => $user->createToken('api')->accessToken
        ]);
    }
}
