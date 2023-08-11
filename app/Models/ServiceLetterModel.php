<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceModel;

class ServiceLetterModel extends Model
{
    use HasFactory;

    protected $table = 'services_letters';
    public function service () {
      return $this->belongsTo(ServiceModel::class);
    }
}
