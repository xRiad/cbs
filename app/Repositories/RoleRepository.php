<?php

namespace App\Repositories;

use App\Models\RoleModel;
use App\Repositories\AbstractRepository;
use App\Enum\Status;

class RoleRepository extends AbstractRepository
{
  protected $modelClass = RoleModel::class;
}