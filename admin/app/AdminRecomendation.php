<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AdminRecomendation extends Model
{
    protected $table='AdminRecomendations';

 public function getCreatedAtAttribute($value)
		{
		    return Carbon::parse($value)->diffForHumans();
		}
}
