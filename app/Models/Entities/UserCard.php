<?php


namespace App\Models\Entities;


use Illuminate\Database\Eloquent\Model;

class UserCard extends Model
{
    protected $fillable = ['last_four','type','user_id','token'];
}
