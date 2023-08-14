<?php

namespace App\Repositories;

use App\Models\ProjectCategoryModel;
use App\Repositories\AbstractRepository;
use App\Enum\Status;

class ProjectCategoryRepository extends AbstractRepository
{
  protected $modelClass = ProjectCategoryModel::class;
}

