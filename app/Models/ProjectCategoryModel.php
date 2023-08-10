<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectModel;
use Spatie\Translatable\HasTranslations;

class ProjectCategoryModel extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'project_categories';
    public $translatable = ['name'];

    public function projects () {
      return $this->hasMany(ProjectModel::class);
    }
}
