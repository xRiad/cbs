<?php

namespace App\Repositories;

use App\Models\AboutSlideModel;
use App\Repositories\AbstractRepository;
use App\Enum\Status;

class AboutSlideRepository extends AbstractRepository
{
  protected $modelClass = AboutSlideModel::class;
}