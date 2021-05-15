<?php

namespace App\Models\Entities\Course;

use Illuminate\Database\Eloquent\Model;

class Packet extends Model
{
    protected $fillable = [
        'name',
        'color',
        'expiration_month',
    ];

    public function prices()
    {
        return $this->hasMany(PacketPrice::class, 'packet_id');
    }
}
