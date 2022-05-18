<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ServiceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ServiceCrudController extends CrudController
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
        CRUD::setModel(\App\Service::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/service');
        CRUD::setEntityNameStrings('service', 'services');
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
        $this->crud->addColumn(['name'=>'title_tm','type'=>'text', 'label'=>'sozbasy tm']);
        $this->crud->addColumn(['name'=>'title_en','type'=>'text', 'label'=>'sozbasy en']);
        $this->crud->addColumn(['name'=>'title_ru','type'=>'text', 'label'=>'sozbasy ru']);
        $this->crud->addColumn(['name'=>'content_tm','type'=>'ckeditor']);
        $this->crud->addColumn(['name'=>'content_en','type'=>'ckeditor']);
        $this->crud->addColumn(['name'=>'content_ru','type'=>'ckeditor']);
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }


    protected function setupShowOperation()
    {
        //CRUD::setFromDb(); // columns
        $this->crud->addColumn(['name'=>'title_tm','type'=>'text', 'label'=>'sozbasy tm']);
        $this->crud->addColumn(['name'=>'title_en','type'=>'text', 'label'=>'sozbasy en']);
        $this->crud->addColumn(['name'=>'title_ru','type'=>'text', 'label'=>'sozbasy ru']);
        $this->crud->addColumn(['name'=>'content_tm','type'=>'ckeditor']);
        $this->crud->addColumn(['name'=>'content_en','type'=>'ckeditor']);
        $this->crud->addColumn(['name'=>'content_ru','type'=>'ckeditor']);
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
        CRUD::setValidation(ServiceRequest::class);
        $this->crud->addField(['name'=>'title_tm','type'=>'text', 'label'=>'sozbasy tm']);
        $this->crud->addField(['name'=>'title_en','type'=>'text', 'label'=>'sozbasy en']);
        $this->crud->addField(['name'=>'title_ru','type'=>'text', 'label'=>'sozbasy ru']);
        $this->crud->addField(['name'=>'content_tm','type'=>'ckeditor']);
        $this->crud->addField(['name'=>'content_en','type'=>'ckeditor']);
        $this->crud->addField(['name'=>'content_ru','type'=>'ckeditor']);
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
