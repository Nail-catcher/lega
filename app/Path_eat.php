<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Path_eat extends Model
{

	protected  $table='path_eat';
    protected $fillable = ['id','title','cost'];
    public $timestamps = false;

    public function eat()
{
    return $this->belongsToMany(Eat::class, 'eat_path_eat','path_eat_id','eat_id');
}
    public function categories()
{
    return $this->belongsToMany(Category::class, 'categories_path_eat','path_eat_id','category_id');
}

  // public function getCategory() {
  //       return Category::find($this->cat_id);
  //   }
}
