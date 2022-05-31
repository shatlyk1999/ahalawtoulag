<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderTruck extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    public $fillable = ['roly', 'name', 'edaraady', 'email', 'orderphone', 'from', 'to',
    'datetime', 'yuk_gornush', 'yuk_agram', 'note'];
}
