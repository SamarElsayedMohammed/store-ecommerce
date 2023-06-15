<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerfication extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'code', 'created_at', 'updated_at'];


    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }
}