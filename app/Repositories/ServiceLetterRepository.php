<?php

namespace App\Repositories;

use App\Models\ServiceLetterModel;
use App\Repositories\AbstractRepository;
use App\Enum\Status;

class ServiceLetterRepository extends AbstractRepository
{
  protected $modelClass = ServiceLetterModel::class;
}