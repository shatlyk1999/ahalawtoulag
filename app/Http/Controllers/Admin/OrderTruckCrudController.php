<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderTruckRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OrderTruckCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrderTruckCrudController extends CrudController
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
        CRUD::setModel(\App\Models\OrderTruck::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/order-truck');
        CRUD::setEntityNameStrings('order truck', 'order trucks');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {   
        $this->crud->addColumn(['name'=>'created_at','type'=>'text', 'label'=>'Sargydyn edilen wagty']);
        $this->crud->addColumn(['name'=>'roly','type'=>'text', 'label'=>'Sargyt edyanin roly']);
        $this->crud->addColumn(['name'=>'name','type'=>'text', 'label'=>'Sargyt edyanin ady']);
        $this->crud->addColumn(['name'=>'email','type'=>'text', 'label'=>'Elektron poctasy']);
        $this->crud->addColumn(['name'=>'edaraady','type'=>'text', 'label'=>'Edara ady (eger-de edara bolsa)']);
        $this->crud->addColumn(['name'=>'orderphone','type'=>'text', 'label'=>'Telefon belgisi']);
        $this->crud->addColumn(['name'=>'from','type'=>'text', 'label'=>'Nireden']);
        $this->crud->addColumn(['name'=>'to','type'=>'text', 'label'=>'Nira']);
        $this->crud->addColumn(['name'=>'datetime','type'=>'text', 'label'=>'Barmaly senesi we wagty']);
        $this->crud->addColumn(['name'=>'yuk_gornush','type'=>'text', 'label'=>'Yukun gornushi']);
        $this->crud->addColumn(['name'=>'yuk_agram','type'=>'text', 'label'=>'Yukun agramy(tonna)']);
        $this->crud->addColumn(['name'=>'note','type'=>'text', 'label'=>'Belik']);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    protected function setupShowOperation()
    {   
        $this->crud->addColumn(['name'=>'created_at','type'=>'text', 'label'=>'Sargydyn edilen wagty']);
        $this->crud->addColumn(['name'=>'roly','type'=>'text', 'label'=>'Sargyt edyanin roly']);
        $this->crud->addColumn(['name'=>'name','type'=>'text', 'label'=>'Sargyt edyanin ady']);
        $this->crud->addColumn(['name'=>'email','type'=>'text', 'label'=>'Elektron poctasy']);
        $this->crud->addColumn(['name'=>'edaraady','type'=>'text', 'label'=>'Edara ady (eger-de edara bolsa)']);
        $this->crud->addColumn(['name'=>'orderphone','type'=>'text', 'label'=>'Telefon belgisi']);
        $this->crud->addColumn(['name'=>'from','type'=>'text', 'label'=>'Nireden']);
        $this->crud->addColumn(['name'=>'to','type'=>'text', 'label'=>'Nira']);
        $this->crud->addColumn(['name'=>'datetime','type'=>'text', 'label'=>'Barmaly senesi we wagty']);
        $this->crud->addColumn(['name'=>'yuk_gornush','type'=>'text', 'label'=>'Yukun gornushi']);
        $this->crud->addColumn(['name'=>'yuk_agram','type'=>'text', 'label'=>'Yukun agramy(tonna)']);
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
        CRUD::setValidation(OrderTruckRequest::class);

        

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
