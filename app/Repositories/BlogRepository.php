<?php
namespace App\Repositories;

use App\Models\BlogModel;
use App\Repositories\AbstractRepository;
use App\Enum\Status;

class BlogRepository extends AbstractRepository
{
  protected $modelClass = BlogModel::class;
}

