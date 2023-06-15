<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Scopes\ProductScope;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory,
        Translatable,
        SoftDeletes;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'brand_id',
        'slug',
        'sku',
        'price',
        'special_price',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'selling_price',
        'manage_stock',
        'qty',
        'in_stock',
        'is_active'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'manage_stock' => 'boolean',
        'in_stock' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'special_price_start',
        'special_price_end',
        'start_date',
        'end_date',
        'deleted_at',
    ];
    protected $hidden = ['translations', 'pivot'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */


    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    protected $translatedAttributes = ['name', 'description', 'short_description'];
    protected static function booted()
    {
        static::addGlobalScope(new ProductScope);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class)->withDefault();
    }

    public function getActive()
    {
        return $this->is_active == 0 ? 'غير مفعل' : 'مفعل';
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'products_categories');
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }

    public function options()
    {
        return $this->hasMany(Option::class, 'product_id');
    }

    //////
    ///
    public function scopeSelection($q)
    {
        return $q->select('id', 'slug')->get();
    }

    public function file()
    {
        return $this->morphMany(File::class, 'Fileable');
    }

    public function hasStock($quantity)
    {
        return $this->qty >= $quantity;
    }

    public function outOfStock()
    {
        return $this->qty === 0;
    }

    public function inStock()
    {
        return $this->qty >= 1;
    }


    public function getTotal($converted = true)
    {
        return $total = $this->special_price ?? $this->price;

    }


}