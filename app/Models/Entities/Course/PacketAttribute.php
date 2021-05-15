<?php

namespace App\Models\Entities\Course;

use Illuminate\Database\Eloquent\Model;

class PacketAttribute extends Model
{
    protected $fillable = [
        'attribute',
        'packet_id',
    ];

    public function packet()
    {
        return $this->belongsTo(Packet::class, 'packet_id');
    }
}
