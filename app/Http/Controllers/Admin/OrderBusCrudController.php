<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderBusRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OrderBusCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrderBusCrudController extends CrudController
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
        CRUD::setModel(\App\Models\OrderBus::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/order-bus');
        CRUD::setEntityNameStrings('order bus', 'order buses');
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
        
        $this->crud->addColumn(['name'=>'created_at','type'=>'text', 'label'=>'Sargydyn edilen wagty']);
        $this->crud->addColumn(['name'=>'roly','type'=>'text', 'label'=>'Sargyt edyanin roly']);
        $this->crud->addColumn(['name'=>'name','type'=>'text', 'label'=>'Sargyt edyanin ady']);
        $this->crud->addColumn(['name'=>'email','type'=>'text', 'label'=>'Elektron poctasy']);
        $this->crud->addColumn(['name'=>'edaraady','type'=>'text', 'label'=>'Edara ady(eger edara bolsa)']);
        $this->crud->addColumn(['name'=>'orderphone','type'=>'text', 'label'=>'Telefon belgisi']);
        $this->crud->addColumn(['name'=>'from','type'=>'text', 'label'=>'Nireden']);
        $this->crud->addColumn(['name'=>'to','type'=>'text', 'label'=>'Nira']);
        $this->crud->addColumn(['name'=>'datetime','type'=>'text', 'label'=>'Barmaly senesi we wagty']);
        $this->crud->addColumn(['name'=>'duration','type'=>'text', 'label'=>'Sargydyn dowamlylygy']);
        $this->crud->addColumn(['name'=>'personnumber','type'=>'text', 'label'=>'Adam sany']);
        $this->crud->addColumn(['name'=>'note','type'=>'text', 'label'=>'Belik']);
       
    }


    protected function setupShowOperation()
    {
        //CRUD::setFromDb(); // columns
        
        $this->crud->addColumn(['name'=>'created_at','type'=>'text', 'label'=>'Sargydyn edilen wagty']);
        $this->crud->addColumn(['name'=>'roly','type'=>'text', 'label'=>'Sargyt edyanin roly']);
        $this->crud->addColumn(['name'=>'name','type'=>'text', 'label'=>'Sargyt edyanin ady']);
        $this->crud->addColumn(['name'=>'email','type'=>'text', 'label'=>'Elektron poctasy']);
        $this->crud->addColumn(['name'=>'edaraady','type'=>'text', 'label'=>'Edara ady(eger edara bolsa)']);
        $this->crud->addColumn(['name'=>'orderphone','type'=>'text', 'label'=>'Telefon belgisi']);
        $this->crud->addColumn(['name'=>'from','type'=>'text', 'label'=>'Nireden']);
        $this->crud->addColumn(['name'=>'to','type'=>'text', 'label'=>'Nira']);
        $this->crud->addColumn(['name'=>'datetime','type'=>'text', 'label'=>'Barmaly senesi we wagty']);
        $this->crud->addColumn(['name'=>'duration','type'=>'text', 'label'=>'Sargydyn dowamlylygy']);
        $this->crud->addColumn(['name'=>'personnumber','type'=>'text', 'label'=>'Adam sany']);
        $this->crud->addColumn(['name'=>'note','type'=>'text', 'label'=>'Belik']);
       
    }
    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(OrderBusRequest::class);

        // $this->crud->addField(['name'=>'created_at','type'=>'text', 'label'=>'Sargydyn edilen wagty']);
        // $this->crud->addField(['name'=>'roly','type'=>'text', 'label'=>'Sargyt edyanin roly']);
        // $this->crud->addField(['name'=>'name','type'=>'text', 'label'=>'Sargyt edyanin ady']);
        // $this->crud->addField(['name'=>'email','type'=>'text', 'label'=>'Elektron poctasy']);
        // $this->crud->addField(['name'=>'orderphone','type'=>'text', 'label'=>'Telefon belgisi']);
        // $this->crud->addField(['name'=>'from','type'=>'text', 'label'=>'Nireden']);
        // $this->crud->addField(['name'=>'to','type'=>'text', 'label'=>'Nira']);
        // $this->crud->addField(['name'=>'datetime','type'=>'text', 'label'=>'Sargydyn wagty']);
        // $this->crud->addField(['name'=>'duration','type'=>'text', 'label'=>'Sargydyn dowamlylygy']);
        // $this->crud->addField(['name'=>'personnumber','type'=>'text', 'label'=>'Adam sany']);
        // $this->crud->addField(['name'=>'note','type'=>'text', 'label'=>'Belik']);
        //CRUD::setFromDb(); // fields

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
