<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
   protected $fillable = [ 'name','path','cost','basket_id'];
}