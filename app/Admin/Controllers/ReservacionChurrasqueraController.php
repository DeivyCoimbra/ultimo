<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use App\Models\ReservacionChurrasquera;
use App\Models\Persona;

class ReservacionChurrasqueraController extends AdminController
{
    protected function grid()
    {
        $grid = new Grid(new ReservacionChurrasquera());

        $grid->column('id', __('ID'));
        $grid->column('persona.nombre', __('Persona'))->display(function ($value) {
            return $value ?? 'N/A';
        });
        $grid->column('fecha_reservacion', __('Fecha de Reservación'));
        $grid->column('cantidad_invitados', __('Cantidad de Invitados'));
        $grid->column('created_at', __('Creado'));
        $grid->column('updated_at', __('Actualizado'));

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(ReservacionChurrasquera::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('persona.nombre', __('Persona'));
        $show->field('fecha_reservacion', __('Fecha de Reservación'));
        $show->field('cantidad_invitados', __('Cantidad de Invitados'));
        $show->field('created_at', __('Creado'));
        $show->field('updated_at', __('Actualizado'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new ReservacionChurrasquera());

        $form->select('persona_id', __('Persona'))->options(Persona::pluck('nombre', 'id'))->required();
        $form->date('fecha_reservacion', __('Fecha de Reservación'))->default(date('Y-m-d'))->required();
        $form->number('cantidad_invitados', __('Cantidad de Invitados'))->min(1)->required();

        return $form;
    }
}