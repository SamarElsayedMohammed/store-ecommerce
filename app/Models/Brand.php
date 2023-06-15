<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory, Translatable;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];

    protected $appends = ['image_path'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slug', 'is_active', 'photo'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatedAttributes = ['name'];



    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function getActive()
    {
        return $this->is_active == 0 ? 'غير مفعل' : 'مفعل';
    }

    public function file()
    {

        return $this->morphMany(File::class, 'Fileable');
    }

    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function imagePath(): Attribute
    {
      
        return Attribute::get(function () {
              $image = '';
             $image_path = $this->file()->get();

            if (!empty($image_path)) {
                 $image_arr =$image_path->pluck('file_name')->toArray();
                return end($image_arr);
            }
            return ($image);
        });
    }
}