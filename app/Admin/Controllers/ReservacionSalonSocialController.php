<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use App\Models\ReservacionSalonSocial;
use App\Models\Persona;

class ReservacionSalonSocialController extends AdminController
{
    protected function grid()
    {
        $grid = new Grid(new ReservacionSalonSocial());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('persona.nombre', __('Persona'));
        $grid->column('fecha_reservacion', __('Fecha de Reservación'));
        $grid->column('cantidad_invitados', __('Cantidad de Invitados'));
        $grid->column('created_at', __('Creado'));
        $grid->column('updated_at', __('Actualizado'));

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(ReservacionSalonSocial::findOrFail($id));

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
        $form = new Form(new ReservacionSalonSocial());

        $form->select('persona_id', __('Persona'))->options(Persona::pluck('nombre', 'id'))->rules('required');
        $form->date('fecha_reservacion', __('Fecha de Reservación'))->rules('required');
        $form->number('cantidad_invitados', __('Cantidad de Invitados'))->rules('required|min:1');

        return $form;
    }
}