<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Modules\User\Models\Department;
use App\Modules\User\Models\Organization;
use App\Modules\User\Models\ParticipantsDirectory;
use App\Modules\User\Models\PositionsDirectory;
use App\Modules\User\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AdminCategoriesController extends AdminController
{
    use HasResourceActions;
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Categories';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid($id = null)
    {

        $grid = new Grid(new Category());

        $grid->filter(function($filter){
            // Remove the default id filter
            $filter->disableIdFilter();

            // Add a column filter
            $filter->like('title', 'Title');
        });

        $grid->column('id', __('ID'));
        $grid->column('title', __('Title'))->expand(function ($model) {

            $products = $model->products()->take(10)->get()->map(function ($product) {
                return $product->only(['id', 'name', 'description']);
            });

            return new Table(['ID', 'name', 'description'], $products->toArray());
        });

        $grid->actions(function ($actions) {
            $actions->disableView();
            $actions->disableDelete();
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
        $form = new Form(new Category());

        $form->text('title', __('Title'));

        $form->tools(function (Form\Tools $tools) {
            // Disable `Veiw` btn.
            $tools->disableView();
            $tools->disableDelete();
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

    public function destroy($id)
    {
        return $this->form()->destroy($id);
    }
}
