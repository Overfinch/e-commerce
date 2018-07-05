<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function presentPrice(){
        return presentPrice($this->price);
    }

    public function scopeMightAlsoLike($query){
        return $query->inRandomOrder()->take(4);
    }
}
