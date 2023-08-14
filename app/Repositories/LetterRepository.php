<?php

namespace App\Repositories;

use App\Models\LetterModel;
use App\Repositories\AbstractRepository;
use App\Enum\Status;

class LetterRepository extends AbstractRepository
{
  protected $modelClass = LetterModel::class;
}