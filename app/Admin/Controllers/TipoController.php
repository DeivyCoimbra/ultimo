<?php

// TipoController.php
namespace App\Admin\Controllers;

use App\Models\Tipo;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use App\Exports\TipoExport;
use Maatwebsite\Excel\Facades\Excel;

class TipoController extends AdminController
{
    protected $title = 'Tipos';

    protected function grid()
    {
        $grid = new Grid(new Tipo());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('nombre', __('Nombre'));
        $grid->column('created_at', __('Creado'))->sortable();
        $grid->column('updated_at', __('Actualizado'))->sortable();

        $grid->tools(function ($tools) {
            $tools->append('<a href="/admin/tipos/export" class="btn btn-sm btn-success">Exportar a Excel</a>');
        });
    
        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(Tipo::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('nombre', __('Nombre'));
        $show->field('created_at', __('Creado'));
        $show->field('updated_at', __('Actualizado'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new Tipo());

        $form->text('nombre', __('Nombre'));

        return $form;
    }

  public function export()
{
  //  return Excel::download(new TipoExport, 'tipos.xlsx');
}

}
