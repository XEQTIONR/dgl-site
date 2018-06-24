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
    //public $teamId;
    public $tournament;
    public $team;
    //public $teamName;
    //public $teamTag;
    //public $tournamentId;
    //public $tournamentName;
    public $toEmail;

    public $captain;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailAddress, $inviteId, ContendingTeam $team, Tournament $tournament)
    {
        //
      $this->inviteId = $inviteId;
//      $this->teamId = $team->id;
//      $this->teamName = $team->name;
//      $this->teamTag = $team->tag;
      $this->tournament = $tournament;
      $this->team = $team;
//      $this->tournamentId = $tournament->id;
//      $this->tournamentName = $tournament->name;
      $this->toEmail = $emailAddress;

      $roster = Roster::where('contending_team_id',$team->id)
                      ->where('captain', 'true')->first();
      $this->captain = Gamer::find($roster->gamer_id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@dglcore.com')
                    ->subject($this->captain->alias.' ('.$this->captain->fname.' '.$this->captain->lname.') invited you to participate in tournament : '.$this->tournament->name.' for his team '.$this->team->name.'.')
                    ->view('mail.sign_up_and_register');
    }
}
