<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function get_categories()
    {
        return $this->belongsTo("App\Models\Category", 'category_id');
    }
    public function get_sub_categories()
    {
        return $this->belongsTo("App\Models\Sub_category", 'sub_category_id');
    }
    public function get_reviews()
    {
        return $this->belongsTo("App\Models\Review", 'product_id');
    }
    
}
