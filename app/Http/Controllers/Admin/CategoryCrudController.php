<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CategoryCrudController extends CrudController
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
        CRUD::setModel(\App\Category::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/category');
        CRUD::setEntityNameStrings('category', 'categories');
    
        // $categories = $this->categories();

        // $this->crud->setColumns([
        //     [
        //         'label' => 'Parent category',
        //         'name'  => 'parent_id',
        //         'type'  => 'relationship',
        //         'function' => function($entry) use($categories){
        //             if($entry->parent_id == 0) return "Esasy kategoria";
                    
        //             return $categories[$entry->parent_id];
        //         }
        //     ],
        //     [
        //         'name'  => 'title',
        //         'label' => 'Category'
        //     ]
        // ]);
        // $this->crud->addFields([

        // ]);
    }





    // private function categories():array
    // {
    //     $categories = (new Category())->get();
    //     $response = [];
    //     foreach ($categories as $category){
    //         $response[$category->id] = $category->title;
    //     }
    //     return $response;
    // }


    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // columns
        $this->crud->addColumn(['name'=>'title_tm','type'=>'text', 'label'=>'sozbasy tm']);
        $this->crud->addColumn(['name'=>'title_en','type'=>'text', 'label'=>'sozbasy en']);
        $this->crud->addColumn(['name'=>'title_ru','type'=>'text', 'label'=>'sozbasy ru']);
        $this->crud->addColumn(['name'=>'parent_id','type'=>'relationship', 'entity'=>'parentCategory']);
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
        CRUD::setValidation(CategoryRequest::class);

        // CRUD::setFromDb(); // fields
        // 62540003
        $this->crud->addField(['name'=>'parent_id','type'=>'relationship', 'entity'=>'parentCategory']);
        $this->crud->addField(['name'=>'title_tm','type'=>'text', 'label'=>'sozbasy tm']);
        $this->crud->addField(['name'=>'title_en','type'=>'text', 'label'=>'sozbasy en']);
        $this->crud->addField(['name'=>'title_ru','type'=>'text', 'label'=>'sozbasy ru']);
        // $this->crud->addField(['name'=>'parent_id','type'=>'relationship', 'ent//ity'=>'parentCategory']);
        // CRUD::field('parent_id')->type('relationship')->entity('parentCategory');
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
