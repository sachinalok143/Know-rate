<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Review extends Model
{	
	public function getCreatedAtAttribute($value)
{
    return Carbon::parse($value)->diffForHumans();
}
   

}
