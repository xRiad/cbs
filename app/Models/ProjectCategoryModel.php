<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectModel;

class ProjectCategoryModel extends Model
{
    use HasFactory;

    protected $table = 'project_categories';

    public function projects () {
      return $this->hasMany(ProjectModel::class);
    }
}
