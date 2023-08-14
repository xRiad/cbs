<?php

namespace App\Repositories;

use App\Models\ContactModel;
use App\Repositories\AbstractRepository;
use App\Enum\Status;

class ContactRepository extends AbstractRepository
{
  protected $modelClass = ContactModel::class;
}