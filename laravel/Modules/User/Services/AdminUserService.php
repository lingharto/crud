<?php

namespace Modules\User\Services;

use Modules\User\Http\Requests\CreateUserRequest;
use Modules\User\Repositories\UserRepository;

class AdminUserService {

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Получить всех пользователей
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getUsers()
    {
        return $this->userRepository->all();
    }

    /**
     * Получить пользователя по id
     *
     * @param $id
     * @return mixed
     */
    public function getUser($id)
    {
        return $this->userRepository->find($id);
    }

    /**
     * Создать нового пользователя
     *
     * @param array $createUserArray
     * @return mixed
     */
    public function createUser(array $createUserArray)
    {
        return $this->userRepository->create($createUserArray);
    }

    /**
     * Редактировать пользователя
     *
     * @param $id
     * @param array $updateUserArray
     * @return mixed
     */
    public function updateUser($id, array $updateUserArray)
    {
        return $this->userRepository->update($id, $updateUserArray);
    }

    /**
     * Удалить пользователя
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteUser($id)
    {
        return $this->userRepository->delete($id);
    }

}
