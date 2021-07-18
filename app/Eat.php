<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eat extends Model
{
    	protected  $table='eat';
    protected $fillable = ['id','title',	'cost',	'weight',	'cat_id','carousel',	'image'];
  
    public $timestamps = false;

    public function getCategory() {
        return Category::find($this->cat_id);
    }

    public function path_eats()
    {
    return $this->belongsToMany(Path_eat::class, 'eat_path_eat','eat_id','path_eat_id');
    }
      public function baskets() {
        return $this->belongsToMany(Basket::class,'order_eat','eat_id','order_id')->withPivot('how_many');
    }
    public function underitems()
    {
        return $this->belongsToMany(Undercategories::class, 'undercategories_eats','eat_id','undercategory_id');
    }

}
