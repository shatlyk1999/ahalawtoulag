<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ServiceItem extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    public $fillable = ['title_tm', 'title_en', 'title_ru',
                        'description_tm', 'description_en', 'description_ru',
                        'content_tm', 'content_en', 'content_ru',
                        'image'];


    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        // or use your own disk, defined in config/filesystems.php
        $disk = 'public';
        // destination path relative to the disk above
        $destination_path = "asset/image";

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (Str::startsWith($value, 'data:image'))
        {
            // 0. Make the image
            $image = \Image::make($value)->encode('jpg', 90);

            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';

            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

            // 3. Delete the previous image, if there was one.
            \Storage::disk($disk)->delete($this->{$attribute_name});

            // 4. Save the public path to the database
            // but first, remove "public/" from the path, since we're pointing to it
            // from the root folder; that way, what gets saved in the db
            // is the public URL (everything that comes after the domain name)
            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }
        else
        {
            return $this->attributes[$attribute_name] = $value;
        }
    }

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

    public function getContentAttribute()
    {
        $locale = app()->getLocale();
        $property = "content_{$locale}";

        return $this->{$property};
    }





}
