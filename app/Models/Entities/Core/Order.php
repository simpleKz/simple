<?php


namespace App\Models\Entities\Core;


use App\Models\Entities\Course\Course;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['sum','user_id','course_id','paybox_id','is_payed','currency','packet_price_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }
}
