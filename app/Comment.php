<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
    	'name',
    	'email',
    	'content',
    	'rate',
    	'product_id',
    ];

    public function product()
    {
    	return $this->belongsTo('Product::class');
    }
}
