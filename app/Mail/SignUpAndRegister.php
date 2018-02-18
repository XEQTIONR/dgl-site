<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\ContendingTeam;
use App\Tournament;

class SignUpAndRegister extends Mailable
{
    use Queueable, SerializesModels;

    public $inviteId;
    public $teamId;
    public $teamName;
    public $teamTag;
    public $tournamentId;
    public $tournamentName;
    public $toEmail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailAddress, $inviteId, ContendingTeam $team, Tournament $tournament)
    {
        //
      $this->inviteId = $inviteId;
      $this->teamId = $team->id;
      $this->teamName = $team->name;
      $this->teamTag = $team->tag;
      $this->tournamentId = $tournament->id;
      $this->tournamentName = $tournament->name;
      $this->toEmail = $emailAddress;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.sign_up_and_register');
    }
}
