<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leagues extends Model
{
    use HasFactory;
    function members(){
      return  $this->hasMany(enrollLeague::class,"league_id");
      }
      function games(){
          return  $this->hasMany(Games::class);
        }
}
