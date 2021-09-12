<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'product_name', 'product_code', 'description','price','image',
    ];

    public function comments(){
        return $this->hasMany(Comment::class);
        
    }
    public function user(){
        return $this->belongsTo(User::class);
        
    }
 
    public function offers(){
        return $this->hasOne('App\Offer','product_id','id')->orderBy('best_offer', 'desc');
        
    }
   
   

    

}
