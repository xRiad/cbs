<?php

namespace App\Repositories;

use App\Models\SubserviceModel;
use App\Repositories\AbstractRepository;
use App\Enum\Status;

class SubserviceRepository extends AbstractRepository
{
  protected $modelClass = SubserviceModel::class;
}