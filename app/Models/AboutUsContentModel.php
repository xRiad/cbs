<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutUsContentModel extends Model
{
    use HasFactory;
    use HasTranslations;

    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'about_us_content';
    public $translatable = ['content'];
}
