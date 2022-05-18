<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NormativeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class NormativeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NormativeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Normative::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/normative');
        CRUD::setEntityNameStrings('normative', 'normatives');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // columns
        $this->crud->addColumn([   // date_picker
            'name'  => 'date',
            'type'  => 'date_picker',
            'label' => 'Date',
         
            // optional:
            'date_picker_options' => [
               'todayBtn' => 'linked',
               'format'   => 'dd-mm-yyyy',
               'language' => 'en'
            ],
         ]);
        $this->crud->addColumn(['name'=>'title_tm','type'=>'text', 'label'=>'sozbasy tm']);
        $this->crud->addColumn(['name'=>'title_en','type'=>'text', 'label'=>'sozbasy en']);
        $this->crud->addColumn(['name'=>'title_ru','type'=>'text', 'label'=>'sozbasy ru']);
        $this->crud->addColumn(['name'=>'description_tm','type'=>'textarea']);
        $this->crud->addColumn(['name'=>'description_en','type'=>'textarea']);
        $this->crud->addColumn(['name'=>'description_ru','type'=>'textarea']);
        $this->crud->addColumn([
            'name'=>'pdf',
            'type'=>'upload_multiple', 
            'upload'    => true,
            'disk'      => 'uploads', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
            // optional:
            'temporary' => 10
            ]);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    protected function setupShowOperation()
    {
        //CRUD::setFromDb(); // columns
        $this->crud->addColumn([   // date_picker
            'name'  => 'date',
            'type'  => 'date_picker',
            'label' => 'Date',
         
            // optional:
            'date_picker_options' => [
               'todayBtn' => 'linked',
               'format'   => 'dd-mm-yyyy',
               'language' => 'en'
            ],
         ]);
        $this->crud->addColumn(['name'=>'title_tm','type'=>'text', 'label'=>'sozbasy tm']);
        $this->crud->addColumn(['name'=>'title_en','type'=>'text', 'label'=>'sozbasy en']);
        $this->crud->addColumn(['name'=>'title_ru','type'=>'text', 'label'=>'sozbasy ru']);
        $this->crud->addColumn(['name'=>'description_tm','type'=>'textarea']);
        $this->crud->addColumn(['name'=>'description_en','type'=>'textarea']);
        $this->crud->addColumn(['name'=>'description_ru','type'=>'textarea']);
        $this->crud->addColumn([
            'name'=>'pdf',
            'type'=>'upload_multiple', 
            'upload'    => true,
            'disk'      => 'uploads', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
            // optional:
            'temporary' => 10
            ]);
        
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
//        CRUD::setValidation(NormativeRequest::class);

  //      CRUD::setFromDb(); // fields
  $this->crud->addField([   // date_picker
    'name'  => 'date',
    'type'  => 'date_picker',
    'label' => 'Date',
 
    // optional:
    'date_picker_options' => [
       'todayBtn' => 'linked',
       'format'   => 'dd-mm-yyyy',
       'language' => 'en'
    ],
 ]);
$this->crud->addField(['name'=>'title_tm','type'=>'text', 'label'=>'sozbasy tm']);
$this->crud->addField(['name'=>'title_en','type'=>'text', 'label'=>'sozbasy en']);
$this->crud->addField(['name'=>'title_ru','type'=>'text', 'label'=>'sozbasy ru']);
$this->crud->addField(['name'=>'description_tm','type'=>'textarea']);
$this->crud->addField(['name'=>'description_en','type'=>'textarea']);
$this->crud->addField(['name'=>'description_ru','type'=>'textarea']);
$this->crud->addField([
'name'=>'pdf',
'type'=>'upload_multiple', 
'upload'    => true,
'disk'      => 'uploads', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
// optional:
'temporary' => 10
]);


        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
