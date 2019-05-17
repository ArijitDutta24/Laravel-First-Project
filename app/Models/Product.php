<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   public function images()
   {
   	//One to many relationship with product and image table
   	// return $this->hasMany('App\Models\ProductImage'); or
   	return $this->hasMany(ProductImage::class);
   }
}
