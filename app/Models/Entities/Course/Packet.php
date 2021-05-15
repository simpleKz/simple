<?php

namespace App\Models\Entities\Course;

use Illuminate\Database\Eloquent\Model;

class Packet extends Model
{
    protected $fillable = [
        'name',
        'color',
        'course_id',
        'expiration_month',
    ];

    public function prices()
    {
        return $this->hasMany(PacketPrice::class, 'packet_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
