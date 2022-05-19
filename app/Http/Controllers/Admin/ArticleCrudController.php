<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ArticleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ArticleCrudController extends CrudController
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
        CRUD::setModel(\App\Article::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/article');
        CRUD::setEntityNameStrings('article', 'articles');
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
        $this->crud->addColumn(['name'=>'slug','type'=>'text', 'label'=>'Slug']);
        $this->crud->addColumn(['name'=>'aboutTitle_tm','type'=>'text', 'label'=>'aboutTitle tm']);
        $this->crud->addColumn(['name'=>'aboutTitle_en','type'=>'text', 'label'=>'aboutTitle en']);
        $this->crud->addColumn(['name'=>'aboutTitle_ru','type'=>'text', 'label'=>'aboutTitle ru']);
        $this->crud->addColumn(['name'=>'aboutCompany_tm','type'=>'ckeditor']);
        $this->crud->addColumn(['name'=>'aboutCompany_en','type'=>'ckeditor']);
        $this->crud->addColumn(['name'=>'aboutCompany_ru','type'=>'ckeditor']);
        $this->crud->addColumn(['name'=>'instagram','type'=>'text']);
        $this->crud->addColumn(['name'=>'email','type'=>'text']);
        $this->crud->addColumn(['name'=>'domain','type'=>'text']);
        $this->crud->addColumn(['name'=>'phoneNumber','type'=>'text']);
        $this->crud->addColumn(['name'=>'phoneNumber2','type'=>'text']);
        $this->crud->addColumn(['name'=>'faxNumber','type'=>'text']);
        $this->crud->addColumn(['name'=>'address_tm','type'=>'text']);
        $this->crud->addColumn(['name'=>'address_en','type'=>'text']);
        $this->crud->addColumn(['name'=>'address_ru','type'=>'text']);
        $this->crud->addColumn(['name'=>'address2_tm','type'=>'text']);
        $this->crud->addColumn(['name'=>'address2_en','type'=>'text']);
        $this->crud->addColumn(['name'=>'address2_ru','type'=>'text']);
        $this->crud->addColumn([
            'name'      => 'image', // The db column name
            'label'     => 'Profile image', // Table column heading
            'type'      => 'image',
            // 'crop'      => true,
            // 'prefix' => 'public/',
            // image from a different disk (like s3 bucket)
            // 'disk'   => 'disk-name', 
            // optional width/height if 25px is not ok with you
            // 'height' => '30px',
            // 'width'  => '30px',
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
        $this->crud->addColumn(['name'=>'slug','type'=>'text', 'label'=>'Slug']);
        $this->crud->addColumn(['name'=>'aboutTitle_tm','type'=>'text', 'label'=>'aboutTitle tm']);
        $this->crud->addColumn(['name'=>'aboutTitle_en','type'=>'text', 'label'=>'aboutTitle en']);
        $this->crud->addColumn(['name'=>'aboutTitle_ru','type'=>'text', 'label'=>'aboutTitle ru']);
        $this->crud->addColumn(['name'=>'aboutCompany_tm','type'=>'ckeditor']);
        $this->crud->addColumn(['name'=>'aboutCompany_en','type'=>'ckeditor']);
        $this->crud->addColumn(['name'=>'aboutCompany_ru','type'=>'ckeditor']);
        $this->crud->addColumn(['name'=>'instagram','type'=>'text']);
        $this->crud->addColumn(['name'=>'email','type'=>'text']);
        $this->crud->addColumn(['name'=>'domain','type'=>'text']);
        $this->crud->addColumn(['name'=>'phoneNumber','type'=>'text']);
        $this->crud->addColumn(['name'=>'phoneNumber2','type'=>'text']);
        $this->crud->addColumn(['name'=>'faxNumber','type'=>'text']);
        $this->crud->addColumn(['name'=>'address_tm','type'=>'text']);
        $this->crud->addColumn(['name'=>'address_en','type'=>'text']);
        $this->crud->addColumn(['name'=>'address_ru','type'=>'text']);
        $this->crud->addColumn(['name'=>'address2_tm','type'=>'text']);
        $this->crud->addColumn(['name'=>'address2_en','type'=>'text']);
        $this->crud->addColumn(['name'=>'address2_ru','type'=>'text']);
        $this->crud->addColumn([
            'name'      => 'image', // The db column name
            'label'     => 'Profile image', // Table column heading
            'type'      => 'image',
            // 'crop'      => true, 
            // image from a different disk (like s3 bucket)
            // 'disk'   => 'disk-name', 
            // optional width/height if 25px is not ok with you
            // 'height' => '30px',
            // 'width'  => '30px',
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
        //CRUD::setValidation(ArticleRequest::class);

        //CRUD::setFromDb(); // fields
        $this->crud->addField(['name'=>'slug','type'=>'text', 'label'=>'Slug']);
        $this->crud->addField(['name'=>'aboutTitle_tm','type'=>'text', 'label'=>'aboutTitle tm']);
        $this->crud->addField(['name'=>'aboutTitle_en','type'=>'text', 'label'=>'aboutTitle en']);
        $this->crud->addField(['name'=>'aboutTitle_ru','type'=>'text', 'label'=>'aboutTitle ru']);
        $this->crud->addField(['name'=>'aboutCompany_tm','type'=>'ckeditor']);
        $this->crud->addField(['name'=>'aboutCompany_en','type'=>'ckeditor']);
        $this->crud->addField(['name'=>'aboutCompany_ru','type'=>'ckeditor']);
        $this->crud->addField(['name'=>'instagram','type'=>'text']);
        $this->crud->addField(['name'=>'email','type'=>'text']);
        $this->crud->addField(['name'=>'domain','type'=>'text']);
        $this->crud->addField(['name'=>'phoneNumber','type'=>'text']);
        $this->crud->addField(['name'=>'phoneNumber2','type'=>'text']);
        $this->crud->addField(['name'=>'faxNumber','type'=>'text']);
        $this->crud->addField(['name'=>'address_tm','type'=>'text']);
        $this->crud->addField(['name'=>'address_en','type'=>'text']);
        $this->crud->addField(['name'=>'address_ru','type'=>'text']);
        $this->crud->addField(['name'=>'address2_tm','type'=>'text']);
        $this->crud->addField(['name'=>'address2_en','type'=>'text']);
        $this->crud->addField(['name'=>'address2_ru','type'=>'text']);
        $this->crud->addField([
            'label' => "Profile Image",
            'name' => "image",
            'type' => 'image',
            // 'crop' => true, // set to true to allow cropping, false to disable
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
