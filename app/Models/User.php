<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'status',
        'id_role',
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

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }
    public function admin()
    {
        return $this->hasOne(Admin::class, 'id_user');
    }
    public function teller()
    {
        return $this->hasOne(Teller::class, 'id_user');
    }
    public function kepala()
    {
        return $this->hasOne(Kepala::class, 'id_user');
    }
    public function nasabah()
    {
        return $this->hasOne(Nasabah::class, 'id_user');
    }
    public function koordinator()
    {
        return $this->hasOne(Koordinator::class, 'id_user');
    }
}