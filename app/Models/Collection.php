<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{    
	protected $table = 'collection';
    protected $guarded = [
        'id','created_at','updated_at'
    ];

    public function collection_categories()
    {
        return $this->hasMany(Category::class, 'collection_id', 'id');
    }   
}
