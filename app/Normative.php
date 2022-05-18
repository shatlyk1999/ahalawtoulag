<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Normative extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    public $fillable = ['title_tm', 'title_en', 'title_ru',
                        'description_tm', 'description_en', 'description_ru',
                        'date', 'pdf'];

    public function setPdfAttribute($value)
    {
        $attribute_name = "pdf";
        $disk = "backpack_public";
        $destination_path = "docs";

        return $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
        
    }


    protected $casts = [
        'pdf' => 'array'
    ];


    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        $property = "title_{$locale}";

        return $this->{$property};
    }

    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        $property = "description_{$locale}";

        return $this->{$property};
    }


}



