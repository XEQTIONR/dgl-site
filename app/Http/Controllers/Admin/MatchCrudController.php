<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Match;
use App\MatchContestant;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\MatchRequest as StoreRequest;
use App\Http\Requests\MatchRequest as UpdateRequest;

class MatchCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Match');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/match');
        $this->crud->setEntityNameStrings('match', 'matches');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        //$this->crud->setFromDb();

        // ------ CRUD FIELDS - For forms
      $this->crud->addField([
          'name' => 'tournament_id',
          'label' => 'Tournament',
          'type' => 'select2',
          'entity' => 'tournament',
          'attribute' => 'name',
          'model' => "App\Tournament"
        ]
        , 'update/create/both');
      $this->crud->addField([
          'name' => 'stage',
          'label' => 'Match Stage',
          'type' => 'enum'
        ]
        , 'update/create/both');
      $this->crud->addField([
          'name' => 'checkinstart',
          'label' => 'Checkin start',
          'type' => 'datetime_picker',
          // optional:
          'datetime_picker_options' => [
            'format' => 'DD/MM/YYYY HH:mm',
            'language' => 'en'
          ],
          'allows_null' => true,
        ]
        , 'update/create/both');
      $this->crud->addField([
          'name' => 'checkinend',
          'label' => 'Checkin End',
          'type' => 'datetime_picker',
          // optional:
          'datetime_picker_options' => [
            'format' => 'DD/MM/YYYY HH:mm',
            'language' => 'en'
          ],
          'allows_null' => true,
        ]
        , 'update/create/both');
      $this->crud->addField([
          'name' => 'matchstart',
          'label' => 'Match start',
          'type' => 'datetime_picker',
          // optional:
          'datetime_picker_options' => [
            'format' => 'DD/MM/YYYY HH:mm',
            'language' => 'en'
          ],
          'allows_null' => true,
        ]
        , 'update/create/both');

      $this->crud->addField([
          'name' => 'notes',
          'label' => 'Notes',
          'type' => 'simplemde'
        ]
        , 'update/create/both');

      $this->crud->addField([
          'label' => "Match Contestants",
          'type' => 'contendingteam',
          'name' => 'contestants', // the method that defines the relationship in your Model
          'entity' => 'contestants', // the method that defines the relationship in your Model
          'attribute' => 'name', // foreign key attribute that is shown to user
          'model' => "App\ContendingTeam", // foreign key model
          'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
        ]
        , 'create');

        // ------ CRUD COLUMNS - For tables
      $this->crud->addColumn([
        'name' => 'id',
        'type' => 'text',
        'label' => 'ID',
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
        'name' => 'checkinstart',
        'label' => 'Checkin Start',
        'type' => 'datetime_picker',
        // optional:
        'datetime_picker_options' => [
          'format' => 'DD/MM/YYYY HH:mm',
          'language' => 'en'
        ],
        'allows_null' => true,
      ]);
      $this->crud->addColumn([
        'name' => 'checkinend',
        'label' => 'Checkin End',
        'type' => 'datetime_picker',
        // optional:
        'datetime_picker_options' => [
          'format' => 'DD/MM/YYYY HH:mm',
          'language' => 'en'
        ],
        'allows_null' => true,
      ]);
      $this->crud->addColumn([
        'name' => 'matchstart',
        'label' => 'Match Start',
        'type' => 'datetime_picker',
        // optional:
        'datetime_picker_options' => [
          'format' => 'DD/MM/YYYY HH:mm',
          'language' => 'en'
        ],
        'allows_null' => true,
      ]);
      $this->crud->addColumn([
        'name' => 'stage',
        'type' => 'enum',
        'label' => 'Stage',
      ]);
      $this->crud->addColumn([
        'name' => 'won_id',
        'type' => 'text',
        'label' => 'Winner',
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
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
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
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
    }

    public function showDetailsRow($id)
    {
      $contestants = \App\MatchContestant::where('match_id', $id)->with('contending_team.roster.gamer')->get();
      return view('admin.matchdetails', compact('contestants'));
    }

    public function store(StoreRequest $request)
    {

        // your additional operations before save here
      $contestants = $request->contestants;
      //** This prevents the error of assigning extra contestants fields on model */
      $this->crud->removeField('contestants', 'update/create/both');



      $redirect_location = parent::storeCrud($request);

      $match = Match::latest()->first();

      if(count($contestants)>0)
      {
      foreach ($contestants as $acontestant)
      {
        $mcon = new MatchContestant();
        $mcon->match_id = $match->id;
        $mcon->contending_team_id = $acontestant;
        $mcon->save();
      }
      }
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
    public function destroy($id)
    {
      MatchContestant::where('match_id', $id)->delete();
      parent::destroy($id);
    }
}
