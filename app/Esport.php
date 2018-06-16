<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Esport extends Model
{

  protected $fillable = ['id','name','slug','icon','description','teamsize'];
  // protected $hidden = [];
  // protected $dates = [];
    use CrudTrait;

  /*
 |--------------------------------------------------------------------------
 | ACCESORS
 |--------------------------------------------------------------------------
 */
  public function getIconAttribute($value)
  {
    if($value == null)
      return null;

    $prefix = "/uploads/images/esports_icon/";
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
    $destination_path = "images/esports_icon";


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
