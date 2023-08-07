<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\SubserviceModel;

class ServiceModel extends Model
{
    use HasFactory;

    protected $table = 'services';

    public function subservices () {
      return $this->hasMany(SubserviceModel::class, 'service_id');
    }
}
