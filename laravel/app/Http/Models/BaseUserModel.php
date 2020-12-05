<?php

namespace App\Http\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class BaseUserModel extends Authenticatable
{
    /**
     * Перевод объекта в массив, для список полей модели
     * @param $obj
     * @return array
     */
    public static function objectToArray($obj) {
        $array = (array) $obj;
        foreach ($array as $index => $attribute) {
            $array[$index] = (array)($attribute);
        }
        return $array;
    }

    /**
     * Получить список полей модели
     *
     * @return array
     */
    public static function getFields()
    {
        $result = self::objectToArray(json_decode(file_get_contents(module_path("User", "Fields/UserAdminFields.json"))));
        return $result;
    }

    public function model()
    {
        return $this;
    }
}
