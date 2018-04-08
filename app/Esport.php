<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Esport extends Model
{
    //
    use CrudTrait;

    protected $fillable =
      ['name', 'description', 'teamsize'];
}
