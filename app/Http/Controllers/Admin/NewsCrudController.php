<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class NewsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NewsCrudController extends CrudController
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
        CRUD::setModel(\App\News::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/news');
        CRUD::setEntityNameStrings('news', 'news');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // columns
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
        $this->crud->addColumn(['name'=>'content_tm','type'=>'ckeditor']);
        $this->crud->addColumn(['name'=>'content_en','type'=>'ckeditor']);
        $this->crud->addColumn(['name'=>'content_ru','type'=>'ckeditor']);
        $this->crud->addColumn([
            'name'      => 'image', // The db column name
            'label'     => 'Profile image', // Table column heading
            'type'      => 'image',
            // 'crop'      =>  true,
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
        // CRUD::setFromDb(); // columns
        $this->crud->addColumn(['name'=>'title_tm','type'=>'text', 'label'=>'sozbasy tm']);
        $this->crud->addColumn(['name'=>'title_en','type'=>'text', 'label'=>'sozbasy en']);
        $this->crud->addColumn(['name'=>'title_ru','type'=>'text', 'label'=>'sozbasy ru']);
        $this->crud->addColumn(['name'=>'content_tm','type'=>'ckeditor']);
        $this->crud->addColumn(['name'=>'content_en','type'=>'ckeditor']);
        $this->crud->addColumn(['name'=>'content_ru','type'=>'ckeditor']);
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

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(NewsRequest::class);
        $this->crud->addField(['name'=>'title_tm','type'=>'text', 'label'=>'sozbasy tm']);
        $this->crud->addField(['name'=>'title_en','type'=>'text', 'label'=>'sozbasy en']);
        $this->crud->addField(['name'=>'title_ru','type'=>'text', 'label'=>'sozbasy ru']);
        $this->crud->addField(['name'=>'content_tm','type'=>'ckeditor']);
        $this->crud->addField(['name'=>'content_en','type'=>'ckeditor']);
        $this->crud->addField(['name'=>'content_ru','type'=>'ckeditor']);
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
        $this->crud->addField([
            'label' => "Profile Image",
            'name' => "image",
            'type' => 'image',
            // 'crop' => true, // set to true to allow cropping, false to disable
            // 'aspect_ratio' => 1, // omit or set to 0 to allow any aspect ratio
            // 'disk'      => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix'    => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
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
