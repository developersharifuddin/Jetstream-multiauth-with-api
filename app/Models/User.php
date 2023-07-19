<?php

namespace App\Models;

use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // protected $guarded = [];

    // protected function getGuarded()
    // {
    //     return [];
    // }


    protected $guard = ['admin','manager', 'employee','customer'];
    
    public function employee()
    {
        return $this->hasOne(Employee::class, 'user_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(CollectionHub::class,'branch_id', 'id');
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function manager()
    {
        return $this->hasOne(Manager::class);
    }
  
    public function branchManager()
    {
        return $this->hasOne(BranchManager::class);
    }


    
}
