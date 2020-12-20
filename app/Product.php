<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'id', 'name', 'price', 'desc', 'image', 'categories_id'
    ];

    /**
     * Get the post that owns the comment.
     *  1 PRODUCT THUOC VE 1 CATEGORY |
     * NHIEU PRODUCT THUOC VE 1 CATE
     * BELONGSTO ( THUOC VE
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'categories_id');
    }
}
