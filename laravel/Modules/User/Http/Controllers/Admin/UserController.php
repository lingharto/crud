<?php

namespace Modules\User\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\User\Http\Requests\CreateUserRequest;
use Modules\User\Http\Requests\UpdateUserRequest;
use Modules\User\Services\AdminUserService;

class UserController extends Controller
{
    protected $userService;

    function __construct(AdminUserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Список пользователей
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        $users = $this->userService->getUsers();
        return $users;
    }

    /**
     * Создать пользователя
     *
     * @param CreateUserRequest $request
     * @return mixed
     */
    public function create(CreateUserRequest $request)
    {
        return $this->userService->createUser($request->all());
    }

    /**
     * Обновить пользователя по id
     *
     * @param $id
     * @param UpdateUserRequest $request
     * @return mixed
     */
    public function update($id, UpdateUserRequest $request)
    {
        return $this->userService->updateUser($id, $request->only(['name', 'email', 'password']));
    }

    /**
     * Удалить пользователя по id
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        return $this->userService->deleteUser($id);
    }

    /**
     * Получить пользователя по id
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->userService->getUser($id);
    }
}
