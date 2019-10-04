<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageDetail extends Model
{
    protected $table = 'image_details';

    protected $fillable = [
    	'name',
    	'product_id',
    ];

    public function product()
    {
    	return $this->belongsTo('Product::class');
    }
}
