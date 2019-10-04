<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
	use SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'name',
        'email',
        'address',
        'tel',
        'note',
        'status',
        'user_id',
    ];

    protected $dates = [
    	'deleted_at',
    ];

    public function user()
    {
    	return $this->belongsTo('User::class');
    }

    public function order_details()
    {
    	return $this->hasMany('OrderDetail::class');
    }
}
