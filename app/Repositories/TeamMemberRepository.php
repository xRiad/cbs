<?php
namespace App\Repositories;

use App\Models\TeamMemberModel;
use App\Repositories\AbstractRepository;
use App\Enum\Status;

class TeamMemberRepository extends AbstractRepository
{
  protected $modelClass = TeamMemberModel::class;
}

