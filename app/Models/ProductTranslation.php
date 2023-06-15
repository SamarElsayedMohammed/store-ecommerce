<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductTranslation extends Model
{
    use SearchableTrait;
    use HasFactory;

    protected $fillable = ['name', 'description', 'short_description'];
    public $timestamps = false;
    // protected $with = ['translations'];
    // protected $searchable = [
    //     'columns' => [
    //         'name' => 1,
    //         'description' => 1,
    //         'short_description' => 1
    //     ]
    // ];
    // public function searchableOptions()
    // {
    //     return [
    //         'nGram' => true,
    //         'distance' => 1,
    //     ];
    // }
}