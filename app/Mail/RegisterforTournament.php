<?php

namespace App\Mail;

use App\ContendingTeam;
use App\Tournament;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterforTournament extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $alias;
    public $team;
    public $tournament;

    public function __construct($alias, ContendingTeam $team, Tournament $tournament)
    {
        //
        $this->alias = $alias;
        $this->team = $team;
        $this->tournament = $tournament;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.register_confirmation_for_tournament');
    }
}
