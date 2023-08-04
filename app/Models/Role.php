<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'abilities',
    ];


    protected $casts = [
        'abilities' => 'array',
    ];


    public function mangers()
    {
        return $this->belongsToMany(Admin::class, 'role_user');
    }
}