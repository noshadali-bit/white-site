<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Inquiry extends Model
{
	protected $table = 'inquiry';
    protected $guarded = [
       'id',  'created_at', 'updated_at'
        
    ];
    
    
   
}
