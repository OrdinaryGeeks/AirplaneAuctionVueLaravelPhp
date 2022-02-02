<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction extends ViewModel
{
    //
    protected $mappings = [
    'user'=>[User::class, 'user', 'array'], 'airplane'=>
    [Airplane::class, 'airplane', 'array']];



}
