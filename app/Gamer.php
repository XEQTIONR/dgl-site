<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Backpack\CRUD\CrudTrait;
use App\Notifications\MailResetPasswordNotification as MailNotification;
use App\Mail\PasswordResetEmail;
use Illuminate\Support\Facades\Mail;

class Gamer extends Authenticatable
{
    //
    use Notifiable;
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    protected $table = 'gamers';
    protected $fillable = [
        'email', 'password', 'alias', 'fname', 'lname', 'dob',
        'steamid', 'battlenetid', 'discordid',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function name()
    {
      $name = $this->fname.' '.$this->lname;
      return $name;
    }

    public function lastteam()
    {

    }

    public function sendPasswordResetNotification($token)
    {
//      $this->notify(new MailNotification($token));
      $mail = new PasswordResetEmail($token);
      Mail::to($this->email)->send($mail);
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function meta()
    {
      return $this->hasMany('App\GamerMeta');
    }

    public function contendingTeam()
    {
      return $this->hasMany('App\ContendingTeam');
    }
}
