<?php

namespace App\Mail;

use App\ContendingTeam;
use App\Gamer;
use App\Tournament;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TournamentRegistrationFinished extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $tournament;
    public $team;
    public $gamer;

    public function __construct(Tournament $tournament, ContendingTeam $team, Gamer $gamer)
    {
        //
      $this->tournament = $tournament;
      $this->team = $team;
      $this->gamer = $gamer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.registration_finished');
    }
}
