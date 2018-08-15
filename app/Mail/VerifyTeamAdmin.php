<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyTeamAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $tournament;
    public $name;
    public $tag;
    public $updated_at;
    public $logo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tournament, $name, $tag, $logo, $updated_at)
    {
        //
      $this->tournament = $tournament;
      $this->name = $name;
      $this->tag = $tag;
      $this->logo = $logo;
      $this->updated_at = $updated_at;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.admin_verify_team');
    }
}
