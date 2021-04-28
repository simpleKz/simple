<?php


namespace App\Models\Entities\Core;


use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['user_id','order_id','paybox_id','amount','profit_holder_id','profit'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function profit_user()
    {
        return $this->belongsTo(User::class,'profit_holder_id','id');
    }
}
