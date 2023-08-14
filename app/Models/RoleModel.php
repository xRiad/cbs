<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectModel;
use Spatie\Translatable\HasTranslations;

class RoleModel extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'roles';
    protected $guarded = [];
    public $translatable = ['name'];

    public function projects () {
      return $this->belongsToMany(ProjectModel::class, 'projects_roles', 'role_id', 'project_id');
    }
}
