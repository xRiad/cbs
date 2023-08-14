<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogModel;
use Spatie\Translatable\HasTranslations;

class BlogCategoryModel extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $guarded = [];
    protected $table = 'blog_categories';
    public $translatable = ['name'];
    
    public function blogs () {
      return $this->hasMany(BlogModel::class);
    }
}
