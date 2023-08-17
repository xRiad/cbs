<?php

namespace App\Repositories;

use App\Models\ServiceModel;
use App\Repositories\AbstractRepository;
use App\Enum\Status;

class ServiceRepository extends AbstractRepository
{
  protected $modelClass = ServiceModel::class;
}