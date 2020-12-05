<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = ['avatar'];
    public $timestamps = false;

    protected $hidden = [
        'id'
    ];

    public function getAvatarAttribute($value)
    {
        return Storage::disk('public')->url($value);
    }

    public function profile()
    {
        return $this->belongsTo('Modules\User\Entities\User');
    }
}
