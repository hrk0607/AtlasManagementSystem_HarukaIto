<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

use App\Models\Users\User;

class Subjects extends Model
{
    const UPDATED_AT = null;


    protected $fillable = [
        'subject'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class); // リレーションの定義
    }

    public function subjects()
    {
        return $this->belongsToMany(\App\Models\Users\Subjects::class, 'subject_users');
    }
}
