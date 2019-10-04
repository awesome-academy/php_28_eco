<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $table = 'views';

    protected $fillable = [
    	'count',
    	'product_id',
    ];

    public function product()
    {
    	return $this->belongsTo('Product::class');
    }
}
