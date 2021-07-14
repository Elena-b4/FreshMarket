<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Manufacture;
use App\Models\Product;
use App\Modules\User\Models\Department;
use App\Modules\User\Models\Organization;
use App\Modules\User\Models\ParticipantsDirectory;
use App\Modules\User\Models\PositionsDirectory;
use App\Modules\User\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Show;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Products';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid($id = null)
    {
        $grid = new Grid(new Product());

        $grid->filter(function($filter){
            // Remove the default id filter
            $filter->disableIdFilter();

            // Add a column filter
            $filter->like('name', 'Name');
            $filter->equal('category_id', 'Category')->select(DB::table('categories')->pluck('title', 'id'));
            $filter->equal('manufacture_id', 'Manufacture')->select(DB::table('manufactures')->pluck('title', 'id'));
            $filter->in('in_stock')->radio([
                '0'    => 'no',
                '1'    => 'yes',
            ]);
        });

        $grid->column('id', __('ID'));
        $grid->column('name', __('Name'))->filter();
        $grid->column('main_image_path', __('Image'))->display(function ($image) {
            return str_replace('images', '', $image);
        })->image('http://127.0.0.1', 100, 100);
        $grid->column('description', __('Description'))->width(170);
        $grid->column('sale_price', __('Sale price'))->filter('range');
        $grid->column('base_price', __('Base price'))->filter('range');
        $grid->column('category_id', __('Category'))->display(function ($id){
           return Category::find($id)->title;
        })->label([
            1 => 'primary',
            2 => 'warning',
            3 => 'success',
            4 => 'info',
        ])->filter();
        $grid->column('manufacture_id', __('Manufacture'))->display(function ($id){
            return Manufacture::find($id)->title;
        })->dot([
            1 => 'danger',
            2 => 'info',
            3 => 'primary',
            4 => 'success',
        ], 'warning')->filter();
        $grid->column('in_stock', __('In stock'))->bool();

        $grid->actions(function ($actions) {
            $actions->disableView();
        });

        return $grid;
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form($id = null)
    {
        $form = new Form(new Product());

        $form->text('name', __('Name'));
        $form->image('main_image_path', __('Image'))->name(function ($image) use ($form){
            return str_replace('public', 'storage', Storage::disk('local')->put('public/img/product', $image));
        });
        $form->textarea('description', __('Description'))->rows(5);
        $form->text('sale_price', __('Sale price'));
        $form->text('base_price', __('Base price'));
        $form->radio('in_stock', __('In stock'))->options([0 => 'no', 1 => 'yes'])->default('0');
        $form->select('category_id', __('Category'))->options(DB::table('categories')->pluck('title', 'id'));
        $form->select('manufacture_id', __('Manufacture'))->options(DB::table('manufactures')->pluck('title', 'id'));


        $form->tools(function (Form\Tools $tools) {
            // Disable `Veiw` btn.
            $tools->disableView();
        });

        $form->footer(function ($footer) {

            // disable reset btn
            $footer->disableReset();

            // disable `View` checkbox
            $footer->disableViewCheck();

            // disable `Continue editing` checkbox
            $footer->disableEditingCheck();

            // disable `Continue Creating` checkbox
            $footer->disableCreatingCheck();
        });

        return $form;
    }

    public function update($id)
    {
        return $this->form()->update($id);
    }

    public function edit($id, Content $content)
    {
        return $content
            ->title($this->title())
            ->description($this->description['edit'] ?? trans('admin.edit'))
            ->body($this->form()->edit($id));
    }
}
