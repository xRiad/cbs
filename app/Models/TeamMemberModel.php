<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TeamMemberModel extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['position'];
    protected $guarded = [];

    protected $table = 'team_members';
}
