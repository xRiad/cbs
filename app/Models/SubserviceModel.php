<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceModel;

class SubserviceModel extends Model
{
    use HasFactory;

    protected $table = 'subservices';

    public function service () {
      $this->belongsTo(ServiceModel::class);
    }
}
