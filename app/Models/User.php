<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Filament\Panel; // ✅ Import the correct Filament Panel class

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
        'password' => 'hashed',
    ];

    /**
     * Check if the user can access Filament Panel.
     */
    
     public function canAccessPanel(Panel $panel): bool
     {
         return $this->hasRole(['Admin', 'Manager','User']); // ✅ Ensure 'Admin' role exists
     }

    protected static function boot()
     {
         parent::boot();
 
         static::created(function ($user) {
             // Ensure user gets a role only if they don't already have one
             if (!$user->hasAnyRole(Role::all()->pluck('name')->toArray())) {
                 $user->assignRole('User');
             }
         });
     }
     
}
