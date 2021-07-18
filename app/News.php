<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['id','title',	'description',	'minidescription',	'created_at',	'updated_at',	'carousel',	'image'];
}
