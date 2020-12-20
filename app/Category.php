<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'id', 'name'
    ];


    // 1 category thi co nhieu product = Has MANY PRODUCT
    /**
     * Get the comments for the blog post.
     */
    public function products()
    {
        return $this->hasMany('App\Product', 'categories_id');
    }
}
