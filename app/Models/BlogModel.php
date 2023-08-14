<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogCategoryModel;
use Spatie\Translatable\HasTranslations;

class BlogModel extends Model
{
    use HasFactory;
    use HasTranslations;
    
    public $translatable = ['title', 'content'];

    protected $table = 'blogs';

    protected $guarded = [];

    public function category () {
      return $this->belongsTo(BlogCategoryModel::class, 'category_id');
    }

    public function getCustomFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d F Y');
    }
}
