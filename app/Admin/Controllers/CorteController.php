<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Corte;

class CorteController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Corte';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Corte());

        $grid->column('id', __('Id'));
        $grid->column('piso', __('Piso'));
        $grid->column('departamento', __('Departamento'));
        $grid->column('fecha de corte', __('Fecha de corte'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Corte::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('piso', __('Piso'));
        $show->field('departamento', __('Departamento'));
        $show->field('fecha de corte', __('Fecha de corte'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Corte());

        $form->number('piso', __('Piso'));
        $form->text('departamento', __('Departamento'));
        $form->date('fecha de corte', __('Fecha de corte'))->default(date('Y-m-d H:i:s'))->required();

        return $form;
    }
}
