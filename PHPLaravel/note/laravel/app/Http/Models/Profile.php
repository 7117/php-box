<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Http\Models\Profile
 *
 * @property int $id
 * @property int $user_id
 * @property string $hobby
 * @property int $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\Profile whereHobby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\Profile whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\Profile whereUserId($value)
 * @mixin \Eloquent
 */
class Profile extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
