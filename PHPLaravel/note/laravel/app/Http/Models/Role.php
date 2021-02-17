<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    public function user()
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }
}
