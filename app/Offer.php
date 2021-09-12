<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    protected $fillable = ['id','best_offer','product_id','buyer_id'];

    public function user(){

        return $this->belongsTo('App\User','buyer_id','id');
    }

    public function product(){
     return $this->belongsTo('App\Product','product_id','id');
     
    }
    
        
}
