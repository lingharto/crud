<?php

namespace Modules\User\Repositories;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Modules\User\Entities\User;
use Modules\User\Http\Requests\CreateUserRequest;
use Modules\User\Http\Requests\UpdateUserRequest;
use Spatie\QueryBuilder\QueryBuilder;

class UserRepository {

    /**
     * Получить всех пользователей
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all()
    {
        $sortFields = User::getSortableFields();
        $users = QueryBuilder::for(User::class)
            ->allowedIncludes(['profile'])
            ->defaultSort('name')
            ->allowedSorts($sortFields)
            ->paginate(request()->get('perPage') ?? 15);

        return $users;
    }

    /**
     * Получить пользователя по id
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return User::with('profile')
            ->findOrFail($id);
    }

    /**
     * Создать нового пользователя
     *
     * @param array $createUserArray
     * @return mixed
     */
    public function create(array $createUserArray)
    {
        $createUserArray['password'] = Hash::make($createUserArray['password']);
        $user = User::create($createUserArray);
        return $user;
    }

    /**
     * Редактировать пользователя
     *
     * @param $id
     * @param array $updateUserArray
     * @return mixed
     */
    public function update($id, array $updateUserArray)
    {
        $user = User::findOrFail($id);
        if (isset($updateUserArray['password']) && $updateUserArray['password']) {
            $updateUserArray['password'] = Hash::make($updateUserArray['password']);
        } else {
            unset($updateUserArray['password']);
        }

        $user = $user->update($updateUserArray);
        return $user;
    }

    /**
     * Удалить пользователя по id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return successResponse();
    }

}
