<?php

namespace App\Repositories;

use App\Models\BlogCategoryModel;
use App\Repositories\AbstractRepository;
use App\Enum\Status;

class BlogCategoryRepository extends AbstractRepository
{
  protected $modelClass = BlogCategoryModel::class;
}

