<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
class Order extends Model
{
    use Notifiable;

   public function eats() {
        return $this->belongsToMany(Eat::class,'order_eat','order_id','eat_id')->withPivot('how_many');
    }
    public function routeNotificationForMail()
  {
    return 'nikita-mokin@mail.ru';
  }
}
