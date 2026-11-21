<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * RelaciÃ³n muchos a muchos con roles.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Helper para verificar si el usuario tiene un rol especÃ­fico.
     */
    public function hasRole($roleName)
    {
        return $this->roles()->where('name', $roleName)->exists();
    }

    /**
     * Obtiene el rol activo que el usuario ha seleccionado en la sesiÃ³n.
     */
    public function getActiveRoleAttribute()
    {
        $id = session('active_role_id');

        return $id ? $this->roles()->find($id) : null;
    }

    /**
     * Verifica si el usuario tiene un rol activo en la sesiÃ³n.
     */
    public function hasActiveRole()
    {
        return $this->active_role !== null;
    }

    public function canAccessModule(string $module): bool
    {
        return in_array($this->active_role?->name, config("academy.modules.{$module}.roles", []), true);
    }
}
