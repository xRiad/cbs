<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutSlideModel extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title', 'content'];
    public $timestamps = false;
    protected $table = 'about_slides';
}
