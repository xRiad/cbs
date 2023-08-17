<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\ServiceModel;

class ServiceAccordionModel extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name', 'content'];
    protected $table = 'services_accordions';
    protected $guarded = [];
    public $timestamps = false; 

    public function service () {
      return $this->belongsTo(ServiceModel::class);
    }
}
