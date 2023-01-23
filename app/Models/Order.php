<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $table    = 'orders';

    protected $fillable = [
        'id',
        'parcel_description',
        'pickup_address',
        'drop_address',
        'pickup_time',
        'drop_time',
        'status',
        'user_id',
        'biker_id',
        'created_at',
        'updated_at',
    ];

    protected $perPage = 10;

    /**
     * user relation method
     * @param void
     * @return object data
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * biker relation method
     * @param void
     * @return object data
     */
    public function biker()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
