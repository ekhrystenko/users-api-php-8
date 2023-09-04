<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\NotFoundUserException;
use App\Http\Controllers\Controller;
use App\Http\DTO\UsersDTO;
use App\Http\Interfaces\UserServiceInterface;
use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\Api\UserResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

/**
 * Class UserController
 * @package App\Http\Controllers\Api
 */
class UserController extends Controller
{
    /**
     * UserController constructor.
     * @param UserServiceInterface $userService
     */
    public function __construct(protected UserServiceInterface $userService)
    {
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $users = $this->userService->getAllUsers();

        return UserResource::collection($users);
    }

    /**
     * @param UserRequest $request
     * @return UserResource
     */
    public function store(UserRequest $request): UserResource
    {
        $userDto = new UsersDTO;
        $user = $this->userService->createUser($userDto->createFormRequest($request->validated()));

        return new UserResource($user);
    }

    /**
     * @param $id
     * @return UserResource|JsonResponse
     * @throws NotFoundUserException
     */
    public function show($id): UserResource|JsonResponse
    {
        $user = $this->userService->getUserById($id);
        $this->checkUser($user);

        return new UserResource($user);
    }

    /**
     * @param UserRequest $request
     * @param $id
     * @return UserResource|JsonResponse
     * @throws NotFoundUserException
     */
    public function update(UserRequest $request, $id): UserResource|JsonResponse
    {
        $userDto = new UsersDTO;
        $user = $this->userService->updateUser($userDto->createFormRequest($request->validated()), $id);
        $this->checkUser($user);

        return new UserResource($user);
    }

    /**
     * @param $id
     * @return NotFoundUserException|Application|ResponseFactory|JsonResponse|Response
     * @throws NotFoundUserException
     */
    public function destroy($id): Response|JsonResponse|Application|ResponseFactory|NotFoundUserException
    {
        $user = $this->userService->deleteUser($id);
        $this->checkUser($user);

        return response(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @param $user
     * @throws NotFoundUserException
     */
    private function checkUser($user)
    {
        if (!$user) {
            throw new NotFoundUserException();
        }
    }
}
