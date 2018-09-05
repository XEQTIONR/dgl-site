<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Banner extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'banners';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['id','title','subtitle','link','image','lft','rgt','depth'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */
    public function getImageAttribute($value)
    {
      $prefix = "/uploads/images/carousel_banners/";
      $link = $prefix.$value;

      return $link;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setImageAttribute($value)
    {
      $disk = "uploads";
      $destination_path = "images/carousel_banners";


      // if a base64 was sent, save the image in disk and store its name in db
      if (starts_with($value, 'data:image'))
      {
        // 1. Make the image
        $image = \Image::make($value);
        // 2. Generate a filename.
        $filename = md5($value.time()).'.jpg';
        // 3. Store the image on disk.
        \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream()); //***
        // 4. Delete existing image

        // 5. Save the path to the database
        $this->attributes['image'] = $filename;
      }
    }
}
