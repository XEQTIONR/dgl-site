<?php

namespace App\Http\Controllers\Admin;

use Laravel\Socialite\Facades\Socialite;

use App\ContendingTeam;
use App\Gamer;
use App\Roster;
use Backpack\CRUD\app\Http\Controllers\CrudController;

use Illuminate\Support\Facades\Mail;
use App\Mail\TeamApproved;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\Contending_teamRequest as StoreRequest;
use App\Http\Requests\Contending_teamRequest as UpdateRequest;

class Contending_teamCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\ContendingTeam');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/contending_team');
        $this->crud->setEntityNameStrings('contending team', 'contending teams');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        //$this->crud->setFromDb();

        // ------ CRUD FIELDS
        $this->crud->addField([
          'name' => 'name',
          'type' => 'text',
          'label' => 'Name',
        ]
        , 'update/create/both');
        $this->crud->addField([
          'name' => 'tag',
          'type' => 'text',
          'label' => 'Tag',
        ]
        , 'update/create/both');
        $this->crud->addField([
          'name' => 'clan',
          'type' => 'text',
          'label' => 'Clan',
        ]
        , 'update/create/both');
        $this->crud->addField([
          'name' => 'tournament_id',
          'type' => 'select2',
          'label' => 'Tournament',
          'entity' => 'tournament',
          'attribute' => 'name',
          'model' => "App\Tournament"
        ]
        , 'update/create/both');
        $this->crud->addField([
          'name' => 'status',
          'type' => 'enum',
          'label' => 'Status',
        ]
        , 'update/create/both');
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
      $this->crud->addColumn([
          'name' => 'logo_size1', // The db column name
          'label' => "Logo", // Table column heading
          'type' => 'image',
          //'prefix' => 'uploads/images/clan_logos/',
          // optional width/height if 25px is not ok with you
          'height' => '75px',
          'width' => '75px',
        ]);
        $this->crud->addColumn([
          'name' => 'name',
          'type' => 'text',
          'label' => 'Name',
        ]);
        $this->crud->addColumn([
          'name' => 'tag',
          'type' => 'text',
          'label' => 'Tag',
        ]);
        $this->crud->addColumn([
          'name' => 'clan',
          'type' => 'text',
          'label' => 'Clan',
        ]);
        $this->crud->addColumn([
          'name' => 'tournament_id',
          'type' => 'select',
          'label' => 'Tournament',
          'entity' => 'tournament',
          'attribute' => 'name',
          'model' => "App\Tournament"
        ]);
        $this->crud->addColumn([
          'name' => 'status',
          'type' => 'text',
          'label' => 'Status',
        ]);
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        $this->crud->addButtonFromModelFunction('line', 'approve', 'approveButton', 'beginning'); // add a button whose HTML is returned by a method in the CRUD model

        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);
        // $this->crud->removeAllButtons();
        // $this->crud->removeAllButtonsFromStack('line');

        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        $this->crud->enableDetailsRow();
        $this->crud->allowAccess('details_row');
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        // $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->addClause('withoutGlobalScopes');
        // $this->crud->addClause('withoutGlobalScope', VisibleScope::class);
        // $this->crud->with(); // eager load relationships
        if(!$this->request->has('order'))
        $this->crud->orderBy('tournament_id');
        // $this->crud->groupBy();
        // $this->crud->limit();
    }

    public function showDetailsRow($id)
    {
      $team = ContendingTeam::find($id);
      $platform_slug = $team->tournament->esport->platform->slug;
      $roster = $team->roster()->get();
      $gamerids = array();

      foreach ($roster as $item)
      {
        array_push($gamerids, $item->gamer_id);
      }

      $gamers = Gamer::find($gamerids);

      foreach($gamers as $gamer)
      {
        if(!is_null($gamer->discordid))
        {
          $discord_data = null;
          try
          {
            $discord_data = Socialite::driver('discord')->userFromToken($gamer->discordid);
          }
          catch(\Exception $e)
          {
            $gamer->discord_username = "-EXPIRED-";
            //return redirect('/discord-oauth'); // regen discord token
          }

          if(!is_null($discord_data))
          {
            $gamer->discord_username = $discord_data->nickname;
            //$gamer->discord_avatar = $discord_data->avatar;
          }
        }
        else // should never reach here.
          $gamer->discord_username = "-NONE-";

        foreach($roster as $item)
        {
          if($item->gamer_id == $gamer->id)
          {
            $gamer->roster_entry = $item;
            break;
          }
        }
      }

      return view('admin.teamdetails', compact('gamers','platform_slug'));
    }

    public function store(StoreRequest $request)
    {
        //Should we create a manual override method to register team??

        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function approve(ContendingTeam $team)
    {

      $team->status = 'ok';

      //return $team->name;

      $roster = Roster::where('contending_team_id', $team->id)
                      ->where('captain', 'true')
                      ->first();

      $captain = Gamer::find($roster->gamer_id);
      $tournament = $team->tournament;

      //Send email to captain that their team has been approved by DGL
      $mail = new TeamApproved($captain->email, $captain->alias, $team, $tournament->name);
      Mail::to($captain->email)->send($mail);

      \Alert::success('Approved team '.$team->name.' for '.$team->tournament->name.'. Email sent to '.$captain->email.'.')->flash();

      //if everything goes well. then save
      $team->save();

      return redirect(config('backpack.base.route_prefix').'/contending_team');
    }
}
