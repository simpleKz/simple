<?php

namespace App\Models\Entities\Setting;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public const DEFAULT_RESOURCE_DIRECTORY = 'images/sliders';

    protected $fillable = ['title', 'description', 'redirect_url', 'image_path'];
}
