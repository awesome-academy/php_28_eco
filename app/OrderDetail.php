<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
	use SoftDeletes;

    protected $table = 'order_details';

    protected $fillable = [
        'price',
        'quantity',
        'order_id',
        'product_id',
    ];

    protected $dates = [
    	'deleted_at',
    ];

    public function order()
    {
    	return $this->belongsTo('Order::class');
    }

    public function product()
    {
    	return $this->belongsTo('Product::class');
    }
}
