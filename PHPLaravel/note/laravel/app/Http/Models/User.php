<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Http\Models\User
 *
 * @property int $id 自动编号
 * @property string $username
 * @property string $password
 * @property string $gender
 * @property string|null $email
 * @property float $price
 * @property string $details
 * @property int|null $uid
 * @property int $status 状态
 * @property mixed|null $list
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 修改时间
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User whereList($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User whereUsername($value)
 * @mixin \Eloquent
 */
class User extends Model
{

    //一对一关联，正向
    public function profile()
    {
        return $this->hasOne(Profile::class,'user_id', 'id');
    }

    //一对多关联，正向
    public function book()
    {
        return $this->hasMany(Book::class, 'user_id', 'id');
    }

    //多对多关联，正向
    public function role()
    {
        return $this->belongsToMany(Role::class,
                                'role_user',
                        'user_id',
                        'role_id',
                             'id')
                    ->withPivot('id', 'details')
                    //->wherePivot('id', 1)
                    ->as('abc');
    }
}










