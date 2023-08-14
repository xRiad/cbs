<?php

namespace App\Repositories;

use App\Models\CompanyIconModel;
use App\Repositories\AbstractRepository;
use App\Enum\Status;

class CompanyIconRepository extends AbstractRepository
{
  protected $modelClass = CompanyIconModel::class;
}