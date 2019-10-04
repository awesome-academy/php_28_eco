<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'status',
        'description',
        'image',
        'price',
        'category_id',
        'cate_parent',
    ];

    protected $dates = [
    	'deleted_at',
    ];

    public function category()
    {
    	return $this->belongsTo('Category::class');
    }

    public function comments()
    {
    	return $this->hasMany('Comment::class');
    }

    public function views()
    {
    	return $this->hasMany('View::class');
    }

    public function image_details()
    {
    	return $this->hasMany('ImageDetail::class');
    }

    public function order_details()
    {
    	return $this->hasMany('OrderDetail::class');
    }
}
