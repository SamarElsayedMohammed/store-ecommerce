<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = ['for'];

    public function file()
    {

        return $this->morphMany(File::class, 'Fileable');
    }
}