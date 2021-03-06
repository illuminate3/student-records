<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Score;
use App\Models\Subject;
use Request;

class Quarter extends Model
{
  protected $fillable = ['name','live'];

  public function scopeIsLive($query)
  {
    return $query->where('live', true);
  }

  public function scopeLatestFirst($query)
  {
    return $query->orderBy('created_at','desc');
  }

  public function score()
  {
    return $this->hasMany(Score::class);
  }

  public function attendance()
  {
    return $this->hasMany(Attendance::class);
  }

  public function months()
  {
    return $this->hasMany(Month::class);
  }

}
