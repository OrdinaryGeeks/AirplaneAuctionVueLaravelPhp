<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
  

    protected $table = "airplanes";
    public $timestamps = true;
protected $fillable = [
    'model', 'built', 'parts', 'name', 'outright2', 'current2', 'increment2'
];

protected $attributes =[
    'outright' => 0,
    'current' => 0,
    'increment'=>0
];
 public function setModelAttribute($value)
 {
     $this->attributes['model'] = ($value);
 }
 public function setbuiltAttribute($value)
 {
     $this->attributes['built'] = $value;
 }
 public function setPartsAttribute($value)
 {
     $this->attributes['parts'] = ($value);
 }
 public function setNameAttribute($value)
 {
     $this->attributes['name'] = ($value);
 }

 public function getModelAttribute($value)
 {
     return $value;
 }
 public function getbuiltAttribute()
 {
    return $this->attributes['built'];
 }
 public function getPartsAttribute()
 {
   return  $this->attributes['parts'];// = ($value);
 }
 public function getNameAttribute()
 {
     return $this->attributes['name'];
    }
    
}
