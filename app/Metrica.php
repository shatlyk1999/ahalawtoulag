<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metrica extends Model
{
    public $fillable = ['ip', 'url', 'date'];
}
