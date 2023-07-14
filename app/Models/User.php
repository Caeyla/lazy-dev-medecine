<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\RankUser;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $status;

    // public function getAuthPassword()
    // {
    //     if($this->rank==RankUser::$POINT_DE_VENTE)
    //         return \bcrypt($this->pvuserpass);
    //     return $this->password;
    // }

    protected $fillable = [
        'name',
        'email',
    ];

    public function findForLogin($name)
    {
        return $this->where('name', $name)->first();
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

}
