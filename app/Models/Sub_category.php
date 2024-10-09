<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    protected $table = 'sub_category';
    protected $fillable = [
        'title' , 'category_id', 'is_active','is_deleted','slug'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    
    public function get_categories()
    {
        return $this->belongsTo("App\Models\Category", 'category_id');
    }
}
