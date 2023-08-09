<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectCategoryModel;
use App\Models\RoleModel;

class ProjectModel extends Model
{
    use HasFactory;

    protected $table = 'projects';

    public function category () {
      return $this->belongsTo(ProjectCategoryModel::class, 'category_id');
    }
    public function roles () {
      return $this->belongsToMany(RoleModel::class, 'projects_roles', 'project_id', 'role_id');
    }
}
