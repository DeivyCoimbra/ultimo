<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use App\Models\ListaInvitadosChurrasquera;
use App\Models\ReservacionChurrasquera;

class ListaInvitadosChurrasqueraController extends AdminController
{
    protected function grid()
    {
        $grid = new Grid(new ListaInvitadosChurrasquera());

        $grid->column('id', __('ID'));
        $grid->column('reservacionChurrasquera.fecha_reservacion', __('Fecha de Reservación'));
        $grid->column('nombres', __('Nombres'));
        $grid->column('apellidos', __('Apellidos'));
        $grid->column('created_at', __('Creado'));
        $grid->column('updated_at', __('Actualizado'));

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(ListaInvitadosChurrasquera::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('reservacionChurrasquera.fecha_reservacion', __('Fecha de Reservación'));
        $show->field('nombres', __('Nombres'));
        $show->field('apellidos', __('Apellidos'));
        $show->field('created_at', __('Creado'));
        $show->field('updated_at', __('Actualizado'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new ListaInvitadosChurrasquera());

        $form->select('reservaciones_churrasquera_id', __('Reservación'))
             ->options(function () {
                 return ReservacionChurrasquera::pluck('fecha_reservacion', 'id');
             })
             ->required();
        $form->text('nombres', __('Nombres'))->required();
        $form->text('apellidos', __('Apellidos'))->required();

        return $form;
    }
}