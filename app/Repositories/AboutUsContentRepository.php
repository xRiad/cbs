<?php

namespace App\Repositories;

use App\Models\AboutUsContentModel;
use App\Repositories\AbstractRepository;
use App\Enum\Status;

class AboutUsContentRepository extends AbstractRepository
{
  protected $modelClass = AboutUsContentModel::class;
}