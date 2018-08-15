<?php

namespace App\Mail;

use App\ContendingTeam;
use App\Match;
use App\MatchContestant;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MatchNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $match;
    public $contestants;
    public $team;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Match $match, $contestants, ContendingTeam $team)
    {
        //
      $this->match = $match;
      $this->contestants = $contestants;
      $this->team = $team;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.match_notification');
    }
}
