<?php

namespace App\Models\Entities\Course;

use Illuminate\Database\Eloquent\Model;

class PacketPrice extends Model
{
    protected $fillable = [
        'packet_id',
        'currency',
        'price',
        'old_price',
    ];

    public function packet()
    {
        return $this->belongsTo(Packet::class, 'packet_id');
    }

}
