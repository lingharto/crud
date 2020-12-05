<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Http\Models\BaseUserModel;


class User extends BaseUserModel implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * Разные этапы жизненного цикла
     */
    public static function boot() {

        parent::boot();

        static::created(function (User $user) {
            $user->profile()->create([
                "avatar" => "avatars/01/default-avatar.png"
            ]);
        });

        static::deleting(function (User $user) {
            $user->profile->delete();
        });

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Получить поля модели, по которым можем производиться сортировка
     *
     * @return array
     */
    public static function getSortableFields()
    {
        return array_keys(array_filter(self::getFields(), function($v){
            return $v['sortable'];
        }));
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne('Modules\User\Entities\UserProfile');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
