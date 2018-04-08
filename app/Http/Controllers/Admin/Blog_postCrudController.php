<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\Blog_postRequest as StoreRequest;
use App\Http\Requests\Blog_postRequest as UpdateRequest;

class Blog_postCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Blog_post');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/blog_post');
        $this->crud->setEntityNameStrings('blog post', 'blog posts');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        //$this->crud->setFromDb();

        // ------ CRUD FIELDS - For forms
      $this->crud->addField([
          'name' => 'title',
          'label' => 'Title',
          'type' => 'text'
        ]
        , 'update/create/both');
      $this->crud->addField([
          'name' => 'subtitle',
          'label' => 'Sub Title',
          'type' => 'text'
        ]
        , 'update/create/both');
      $this->crud->addField([
          'name' => 'banner',
          'label' => 'Banner Image',
          'type' => 'image',
          'crop' => false, // set to true to allow cropping, false to disable
          'aspect_ratio' => 0, // ommit or set to 0 to allow any aspect ratio
          'upload' => true,
          'disk' => 'uploads',
          'prefix' => 'uploads/images/blog_banners/'
        ]
        , 'update/create/both');
      $this->crud->addField([
          'name' => 'body',
          'label' => 'Body',
          'type' => 'simplemde'
        ]
        , 'update/create/both');

      //TODO: tags
      $this->crud->addField([
          'name' => 'tournament_id',
          'label' => 'Tournament',
          'type' => 'select2',
          'entity' => 'tournament',
          'attribute' => 'name',
          'model' => "App\Tournament"
        ]
        , 'update/create/both');
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS - For tables
        //$this->crud->setColumns(['title', 'subtitle', 'banner', 'body', 'tournament_id']);
      $this->crud->addColumn([
        'name' => 'title',
        'type' => 'text',
        'label' => 'Title',
      ]);
      $this->crud->addColumn([
        'name' => 'subtitle',
        'type' => 'text',
        'label' => 'Subtitle',
      ]);
      $this->crud->addColumn([
        'name' => 'banner',
        'type' => 'image',
        //'width' => '50px',
        'height' => '100px',
        'label' => 'Banner Image',
        'prefix' => 'uploads/images/blog_banners/'
      ]);
      $this->crud->addColumn([
        'name' => 'tournament_id',
        'type' => 'select',
        'label' => 'Tournament',
        'entity' => 'tournament',
        'attribute' => 'name',
        'model' => "App\Tournament"
      ]);
      //TODO: tags
//      $this->crud->addColumn([
//        'name' => 'body',
//        'type' => 'textarea',
//        'label' => 'Body',
//      ]);

        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD BUTTONS
       //$this->crud->addButton('line', 'Editz', 'model_function','update', 'line'); // add a button; possible types are: view, model_function
      //$this->crud->addButtonFromView('line', 'preview', 'update', 'beginning');
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
        // $this->crud->enableDetailsRow();
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

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        //dd($request);
        //echo $request->banner."<br>";
        //echo $request->banner = "CHANGED.jpg";
        //die();
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
}
