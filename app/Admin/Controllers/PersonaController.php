<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use App\Models\Persona;
use App\Models\Tipo;

class PersonaController extends AdminController
{
    protected function grid()
    {
        $grid = new Grid(new Persona());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('nombre', __('Nombre'));
        $grid->column('apellido', __('Apellido'));
        $grid->column('telefono', __('Teléfono'));
        $grid->column('piso', __('Piso'));
        $grid->column('departamento', __('Departamento'));
        $grid->column('tipo.nombre', __('Tipo'));
        $grid->column('created_at', __('Creado el'));
        $grid->column('updated_at', __('Actualizado el'));

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(Persona::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('nombre', __('Nombre'));
        $show->field('apellido', __('Apellido'));
        $show->field('telefono', __('Teléfono'));
        $show->field('piso', __('Piso'));
        $show->field('departamento', __('Departamento'));
        $show->field('tipo.nombre', __('Tipo'));
        $show->field('created_at', __('Creado el'));
        $show->field('updated_at', __('Actualizado el'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new Persona());

        $form->text('nombre', __('Nombre'));
        $form->text('apellido', __('Apellido'));
        $form->number('telefono', __('Teléfono'));
        $form->number('piso', __('Piso'));
        $form->text('departamento', __('Departamento'));
        $form->select('tipo_id', __('Tipo'))->options(Tipo::all()->pluck('nombre', 'id'));

        return $form;
    }
}