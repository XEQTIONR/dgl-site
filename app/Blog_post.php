<?php

  namespace App;

  use Illuminate\Database\Eloquent\Model;
  use Backpack\CRUD\CrudTrait;

  class Blog_post extends Model
  {
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'blog_posts';
    protected $primaryKey = 'id';
    public $timestamps = true;
    //protected $guarded = ['id'];
    protected $fillable = ['title', 'subtitle', 'banner', 'body','tournament_id'];
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

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
//    public function setImageAttribute($value)
//    {
//      $attribute_name = "image";
//      if (request()->hasFile($attribute_name) && request()->file($attribute_name)->isValid()) {
//        throw new \Exception('IT SHOULD WORK'); }
//
//      $disk = "uploads";
//      $destination_path = "/uploads";
//      $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
//    }
//    public function setFilenameAttribute($value)
//    {
//      $attribute_name = "filename";
//      $disk = "uploads";
//      $destination_path = "";
//
//      $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
//    }

    public function setBannerAttribute($value)
    {
      //echo "setimageattr <br>";
      //echo md5($value.time()).'.jpg';
      //die();
      $attribute_name = "banner";
      $disk = "uploads";
      $destination_path = "images/blog_banners"; //***

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
  }
