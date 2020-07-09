<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'created_at',
        'updated_at',
        'quantity',
        'price', 
        'in_stock',
        'description',
        'brand',
        'expiration_date',
        'min_allowed_stock',
        'image',
      
        
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_item');
    }

}
