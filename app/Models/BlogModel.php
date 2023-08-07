<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogCategoryModel;

class BlogModel extends Model
{
    use HasFactory;
    
    protected $table = 'blogs';

    public function category () {
      return $this->belongsTo(BlogCategoryModel::class, 'category_id');
    }
}
