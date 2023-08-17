<?php
namespace App\Repositories;

use App\Models\User;
use App\Repositories\AbstractRepository;
use App\Enum\Status;

class AdminRepository extends AbstractRepository
{
  protected $modelClass = User::class;
}

