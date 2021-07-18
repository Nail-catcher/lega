<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Undercategories extends Model
{
    protected $fillable = [        
        'title',
        'slug',
        'image',
    ];
    public $timestamps = false;
    

    public static function roots() {
        return self::all();
    }

    public function Eats()
	{
    	return $this->belongsToMany(Eat::class, 'undercategories_eats','undercategory_id','eat_id');
	}
}
