<?php
namespace App\Repositories;

use App\Models\ProjectModel;
use App\Repositories\AbstractRepository;
use App\Enum\Status;

class ProjectRepository extends AbstractRepository
{
  protected $modelClass = ProjectModel::class;
}