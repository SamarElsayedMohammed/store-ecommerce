<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    const PAID = 'paid';
    const UNPAID = 'unpaid';

    protected $guarded = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['start_date', 'end_date', 'deleted_at'];


    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

}
