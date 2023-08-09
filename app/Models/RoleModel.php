<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectModel;

class RoleModel extends Model
{
    use HasFactory;

    protected $table = 'roles';
    public function projects () {
      return $this->belongsToMany(ProjectModel::class, 'projects_roles', 'role_id', 'project_id');
    }
}
