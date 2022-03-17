<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'user_permissions';

    public function user()
    {
        return $this->hasMany(User::class, 'name', 'permission');
    }

}
