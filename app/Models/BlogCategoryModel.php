<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogModel;

class BlogCategoryModel extends Model
{
    use HasFactory;

    protected $table = 'blog_categories';
    public function blogs () {
      return $this->hasMany(BlogModel::class);
    }
}
