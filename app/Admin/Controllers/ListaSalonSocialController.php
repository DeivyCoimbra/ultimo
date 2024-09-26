<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use App\Models\ListaSalonSocial;
use App\Models\ReservacionSalonSocial;

class ListaSalonSocialController extends AdminController
{
    protected function grid()
    {
        $grid = new Grid(new ListaSalonSocial());

        $grid->column('id', __('ID'));
        $grid->column('reservacion.fecha_reservacion', __('Fecha de Reservación'));
        $grid->column('nombres', __('Nombres'));
        $grid->column('apellidos', __('Apellidos'));
        $grid->column('created_at', __('Creado'));
        $grid->column('updated_at', __('Actualizado'));

        return $grid;
    }

    // ... otros métodos ...


    protected function detail($id)
    {
        $show = new Show(ListaSalonSocial::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('reservacion.fecha_reservacion', __('Fecha de Reservación'));
        $show->field('nombres', __('Nombres'));
        $show->field('apellidos', __('Apellidos'));
        $show->field('created_at', __('Creado'));
        $show->field('updated_at', __('Actualizado'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new ListaSalonSocial());
    
        $form->select('reservacion_id', __('Reservación'))
             ->options(ReservacionSalonSocial::pluck('fecha_reservacion', 'id'))
             ->required();
        $form->text('nombres', __('Nombres'))->required();
        $form->text('apellidos', __('Apellidos'))->required();
    
        return $form;
    }
}