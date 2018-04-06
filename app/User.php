<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Appoint;
class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','level','picture_user','status'        
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function appoint() {
        return $this->hasMany(Appoint::class);
    }
    public function owns($user,$appoint) {
        return $user->id == $appoint->user_id;
    }
    public function isSuperAdmin($user) {
        return $user->level == 'admin';
    }
}