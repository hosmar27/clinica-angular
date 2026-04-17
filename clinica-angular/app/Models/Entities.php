<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    public const ROLE_ADMIN = 'admin';
    public const ROLE_DENTIST = 'dentist';
    public const ROLE_PATIENT = 'patient';

    public static function getAllowedRoles(): array
    {
        return [self::ROLE_ADMIN, self::ROLE_DENTIST, self::ROLE_PATIENT];
    }

    protected $fillable = ['name', 'email', 'password', 'role'];
    protected $hidden = ['password', 'remember_token'];

    public function isDentist(): bool { return $this->role === self::ROLE_DENTIST; }
    public function isPatient(): bool { return $this->role === self::ROLE_PATIENT; }
    public function isAdmin(): bool { return $this->role === self::ROLE_ADMIN; }

    public function dentist() { return $this->hasOne(Dentist::class); }
    public function patient() { return $this->hasOne(Patient::class); }
}