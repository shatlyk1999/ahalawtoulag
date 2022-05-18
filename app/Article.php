<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;


class Article extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    

    public $fillable = ['slug', 'aboutTitle_tm', 'aboutTitle_en', 'aboutTitle_ru',
                        'aboutCompany_tm', 'aboutCompany_en', 'aboutCompany_ru',
                        'instagram', 'email', 'domain', 'phoneNumber', 'phoneNumber2',
                        'faxNumber', 'address_tm', 'address_en', 'address_ru',
                        'address2_tm', 'address2_en', 'address2_ru',
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



    public function getAboutTitleAttribute()
    {
        $locale = app()->getLocale();
        $property = "aboutTitle_{$locale}";

        return $this->{$property};
    }

    public function getAboutCompanyAttribute()
    {
        $locale = app()->getLocale();
        $property = "aboutCompany_{$locale}";

        return $this->{$property};
    }

    public function getAddressAttribute()
    {
        $locale = app()->getLocale();
        $property = "address_{$locale}";

        return $this->{$property};
    }

    public function getAddress2Attribute()
    {
        $locale = app()->getLocale();
        $property = "address2_{$locale}";

        return $this->{$property};
    }
                    

}
