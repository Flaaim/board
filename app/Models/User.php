<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
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
    ];

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn($value) => bcrypt($value)
        );
    }

    public function verify(){
        $this->update([
            'email_verified_at' => Carbon::now()
        ]);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function canDo($perms){
        if(is_array($perms)){
            foreach($perms as $permission){
                return $this->canDo($permission);
            }
        } else {
            foreach($this->roles as $role){
                    foreach($role->permissions as $perm){
                        if($perm->alias == $perms){
                            return true;
                        }
                    }

            }
        }
        return false;
    }

    public function saveRoles($roles){
        if(!empty($roles)){
            $this->roles()->sync($roles);
        } else {
            $this->roles()->detach();
        }
    }
}
