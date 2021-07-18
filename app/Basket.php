<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected  $table='orders';
    protected $fillable = ['id',	'name',	'phone',	'email',	'street',	'home',	'apartment',	'entrance',	'floor',	'order_time',	'person',	'how_money',	'points_pay','user_id',	'status','shipping','cashback',	'created_at',	'updated_at'];
    
    public function eats() {
        return $this->belongsToMany(Eat::class,'order_eat','order_id','eat_id')->withPivot('how_many');
    }

    /**
     * Увеличивает кол-во товара $id в корзине на величину $count
     */
    public function increase($id, $count = 1) {
        $this->change($id, $count);
    }

    /**
     * Уменьшает кол-во товара $id в корзине на величину $count
     */
    public function decrease($id, $count = 1) {
        $this->change($id, -1 * $count);
    }

    /**
     * Изменяет количество товара $id в корзине на величину $count;
     * если товара еще нет в корзине — добавляет этот товар; $count
     * может быть как положительным, так и отрицательным числом
     */
    private function change($id, $count = 0) {
        if ($count == 0) {
            return;
        }
        // если товар есть в корзине — изменяем кол-во
        if ($this->eats->contains($id)) {
            // получаем объект строки таблицы `basket_eat`
            $pivotRow = $this->eats()->where('eat_id', $id)->first()->pivot;
            //dd($pivotRow);
            $quantity = $pivotRow->how_many + $count;
            if ($quantity > 0) {
                // обновляем количество товара $id в корзине
                $pivotRow->update(['how_many' => $quantity]);
            } else {
                // кол-во равно нулю — удаляем товар из корзины
                $pivotRow->delete();
            }
        } elseif ($count > 0) { // иначе — добавляем этот товар
            $this->eats()->attach($id, ['how_many' => $count]);
        }
        // обновляем поле `updated_at` таблицы `baskets`
        $this->touch();
    }

    /**
     * Удаляет товар с идентификатором $id из корзины покупателя
     */
    public function remove($id) {
        // удаляем товар из корзины (разрушаем связь)
        $this->eats()->detach($id);
        // обновляем поле `updated_at` таблицы `baskets`
        $this->touch();
    }
}
