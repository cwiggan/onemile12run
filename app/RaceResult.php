<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceResult extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'distance', 'laps', 'age', 'gender', 'year', 'age_group', 'bid', 'time'];
}
