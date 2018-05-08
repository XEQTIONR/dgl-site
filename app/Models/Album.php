<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Album extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'albums';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['name','description','id','folder_slug','cover_image'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function  setCoverImageAttribute($value)
    {
      $attribute_name = "cover_image";
      $disk = "uploads";
      $destination_path = "images/albums/cover_images/"; //***

      // if the image was erased
      if ($value==null) {
        // delete the image from disk
        \Storage::disk($disk)->delete($destination_path.'/'.$this->{$attribute_name});

        // set null in the database column
        $this->attributes[$attribute_name] = "";
      }

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
        if(strlen($this->{$attribute_name})>0)
        {
          \Storage::disk($disk)->delete($destination_path.'/'.$this->{$attribute_name});
        }
        // 5. Save the path to the database
        $this->attributes[$attribute_name] = $filename;

      }
    }

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

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
