<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Platform extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'platforms';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    //protected $fillable = ['id','name', 'slug', 'icon',];
    protected $hidden = [];
    protected $dates = ['created_at', 'updated_at'];

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
    public function getIconAttribute($value)
    {
      if($value == null)
        return null;

      $prefix = "/uploads/images/platform_icons/";
      $link = $prefix.$value;

      return $link;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setIconAttribute($value)
    {
      $disk = "uploads";
      $destination_path = "images/platform_icons";


      // if a base64 was sent, save the image in disk and store its name in db
      if (starts_with($value, 'data:image'))
      {
        // 1. Make the image
        $image = \Image::make($value);
        // 2. Generate a filename.
        $filename = md5($value.time()).'.png';
        // 3. Store the image on disk.
        \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream()); //***
        // 4. Delete existing image

        // 5. Save the path to the database
        $this->attributes['icon'] = $filename;
      }
    }
}
