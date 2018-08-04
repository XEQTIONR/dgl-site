<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TeamApproved extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $teamName;
    public $teamTag;
    public $tournament;
    public $toEmail;
    public $alias;

    public function __construct($toAddress, $toAlias, $team, $tournamentName)
    {
        //
      $this->toEmail = $toAddress;
      $this->alias = $toAlias;
      $this->teamName = $team->name;
      $this->teamTag = $team->tag;
      $this->tournament = $tournamentName;
      $this->logo = $team->logo_size1;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@dglcore.com')
                    ->subject($this->teamTag.' approved for '.$this->tournament.'.')
                    ->view('mail.team_approved');
    }
}
