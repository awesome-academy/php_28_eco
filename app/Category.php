<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'parent_id',
    ];

    public function products()
    {
    	return $this->hasMany('Product::class');
    }

    public function product_suggests()
    {
    	return $this->hasMany('ProductSuggest::class');
    }
}
