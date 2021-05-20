<?php

namespace App\Models\Entities\Course;

use App\Models\Entities\Core\User;
use Illuminate\Database\Eloquent\Model;

class UserPacket extends Model
{
    protected $fillable = [
        'packet_id',
        'user_id',
        'due_date'
    ];

    public function packet()
    {
        return $this->belongsTo(Packet::class, 'packet_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user-id');
    }



}
