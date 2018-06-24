<?php

namespace App\Mail;

use App\ContendingTeam;
use App\Gamer;
use App\Roster;
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
    public $captain;

    public function __construct($alias, ContendingTeam $team, Tournament $tournament)
    {
        //
        $this->alias = $alias;
        $this->team = $team;
        $this->tournament = $tournament;
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
                    ->view('mail.register_confirmation_for_tournament');
    }
}
