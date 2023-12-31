<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\ServiceModel;

class SubserviceModel extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];
    public $timestamps = false;
    protected $table = 'subservices';
    protected $guarded = [];

    public function service () {
      return $this->belongsTo(ServiceModel::class);
    }
}
