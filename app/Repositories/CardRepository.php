<?php

namespace App\Repositories;

use App\Models\CardModel;
use App\Repositories\AbstractRepository;
use App\Enum\Status;

class CardRepository extends AbstractRepository
{
  protected $modelClass = CardModel::class;
}