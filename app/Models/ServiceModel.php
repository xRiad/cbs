<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\SubserviceModel;
use App\Models\ServiceAccordionModel;
use App\Models\ServiceLetterModel;

class ServiceModel extends Model
{
    use HasFactory;
    use HasTranslations;

    public $timestamps = false;
    protected $table = 'services';
    public $translatable = ['name', 'title', 'question', 'content'];

    public function subservices () {
      return $this->hasMany(SubserviceModel::class, 'service_id');
    }
    public function serviceAccordions () {
      return $this->hasMany(ServiceAccordionModel::class, 'service_id');
    }
    public function serviceLetters () {
      return $this->hasMany(ServiceLetterModel::class, 'service_id');
    }
}
