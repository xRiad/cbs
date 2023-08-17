<?php

namespace App\Repositories;

use App\Models\LanguageLineModel;
use App\Repositories\AbstractRepository;
use App\Enum\Status;

class LanguageLineRepository extends AbstractRepository
{
  protected $modelClass = LanguageLineModel::class;
}