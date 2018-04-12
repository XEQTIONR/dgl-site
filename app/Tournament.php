<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Tournament extends Model
{
    //
  use CrudTrait;

  /*
  |--------------------------------------------------------------------------
  | GLOBAL VARIABLES
  |--------------------------------------------------------------------------
  */
//  protected $fillable =
//    ['name', 'description', 'rules',
//      'squadsize', 'title', 'champion_id',
//      'registration_end','startdate','enddate'];

    protected $table = 'tournaments';
    protected $primaryKey = 'id';
    public $timestamps = true;
    //protected $guarded = ['id'];
    protected $fillable = ['name', 'description', 'rules', 'registration_end',
                          'startdate', 'enddate', 'squadsize', 'title'];
    // protected $hidden = [];
    // protected $dates = [];
    //protected $hidden = [];
  /*
   |--------------------------------------------------------------------------
   | RELATIONS
   |--------------------------------------------------------------------------
   */
    public function esport()
    {
      return $this->belongsTo('App\Esport','title'); // FK title references id
    }

    public function contenders()
    {
      return $this->hasMany('App\ContendingTeam');
    }

    public function matches()
    {
      return $this->hasMany('App\Match');
    }
}
