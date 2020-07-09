<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'created_at',
        'updated_at',
        'category_name',
        
    ];

    public function items()
    {
        return $this->belongsToMany('App\Item', 'category_item');
    }
}

