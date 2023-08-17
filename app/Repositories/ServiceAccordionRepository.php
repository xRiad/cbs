<?php

namespace App\Repositories;

use App\Models\ServiceAccordionModel;
use App\Repositories\AbstractRepository;
use App\Enum\Status;

class ServiceAccordionRepository extends AbstractRepository
{
  protected $modelClass = ServiceAccordionModel::class;
}