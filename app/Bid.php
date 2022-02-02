<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    //

    protected $table = "bids";
    public $timestamps = true;
protected $fillable = [
    'airplaneID', 'userID', 'bidValue', 'planeName', 'planeModel'];
}
