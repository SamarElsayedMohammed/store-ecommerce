<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;


class Admin extends User
{
  use HasFactory;
  protected $fillable = ['name', 'email', 'password'];




  //   public function setPasswordAttribute($value)
  // {
  //     $this->attributes['password'] = Hash::make($value);
  // }

  protected function password(): Attribute
  {
    return Attribute::make(
      set: fn($value) => Hash::make($value),
    );
  }
  public function roles()
  {
    return $this->belongsToMany(Role::class, 'role_user');
  }
  public function hasAbility($ability)
  {
    foreach ($this->roles as $role) {
      if (in_array($ability, $role->abilities)) {
        return false;
      }
    }
    return false;
  }
}