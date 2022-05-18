<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;

class Category extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    // use HasTranslations;
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public $fillable = ['title_tm','title_en','title_ru', 'slug_en', 'slug_tm', 'slug_ru', 
                        'parent_id', 'sort_order', 'top', 'status'];

    // public $fillable = ['parent_id', 'title'];


    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        $property = "title_{$locale}";

        return $this->{$property};
    }

    public function getSlugAttribute()
    {
        $locale = app()->getLocale();
        $property = "slug_{$locale}";

        return $this->{$property};
    }

}
