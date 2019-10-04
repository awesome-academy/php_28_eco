<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSuggest extends Model
{
    protected $table = 'product_suggests';

    protected $fillable = [
        'name',
        'status',
        'description',
        'image',
        'price',
        'category_id',
        'cate_parent',
        'user_id',
    ];

    public function category()
    {
    	return $this->belongsTo('Category::class');
    }

    public function user()
    {
    	return $this->belongsTo('User::class');
    }
}
