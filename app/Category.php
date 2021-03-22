<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	protected $fillable = [        
        'title',
        'slug',
        'image',
    ];
    public $timestamps = false;
    public function getEats() {
        return Eat::where('cat_id', $this->id)->get();
    }

    public static function roots() {
        return self::all();
    }

    public function path_eats()
	{
    	return $this->belongsToMany(Path_eat::class, 'categories_path_eat','category_id','path_eat_id');
	}
}
