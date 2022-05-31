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
        CRUD::column('roly');
        CRUD::column('name');
        CRUD::column('edaraady');
        CRUD::column('email');
        CRUD::column('orderphone');
        CRUD::column('from');
        CRUD::column('to');
        CRUD::column('datetime');
        CRUD::column('yuk_gornush');
        CRUD::column('yuk_agram');
        CRUD::column('note');

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
        CRUD::setValidation(OrderTruckRequest::class);

        CRUD::field('roly');
        CRUD::field('name');
        CRUD::field('edaraady');
        CRUD::field('email');
        CRUD::field('orderphone');
        CRUD::field('from');
        CRUD::field('to');
        CRUD::field('datetime');
        CRUD::field('yuk_gornush');
        CRUD::field('yuk_agram');
        CRUD::field('note');

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
