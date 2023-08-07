<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectCategoryModel;

class ProjectModel extends Model
{
    use HasFactory;

    protected $table = 'projects';

    public function category () {
      return $this->belongsTo(ProjectCategoryModel::class, 'category_id');
    }
}
