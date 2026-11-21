<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'display_name'];

    /**
     * Relación muchos a muchos con usuarios.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
