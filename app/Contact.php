<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    public $fillable = ['name', 'email', 'phone', 'creted_at', 'textarea'];
}
