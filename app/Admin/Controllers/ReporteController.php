<?php
namespace App\Admin\Controllers;

use App\Models\Reporte;
use App\Models\Persona;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use App\Exports\ReporteExport;
use Maatwebsite\Excel\Facades\Excel;
class ReporteController extends AdminController
{
    protected $title = 'Reportes';

    protected function grid()
    {
        $grid = new Grid(new Reporte());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('persona.nombre', __('Persona'));
        $grid->column('descripcion', __('Descripción'));
        $grid->column('created_at', __('Creado'))->sortable();
        $grid->column('updated_at', __('Actualizado'))->sortable();

        $grid->tools(function ($tools) {
            $tools->append('<a href="/admin/reportes/export" class="btn btn-sm btn-success">Exportar a Excel</a>');
        });

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(Reporte::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('persona.nombre', __('Persona'));
        $show->field('descripcion', __('Descripción'));
        $show->field('created_at', __('Creado'));
        $show->field('updated_at', __('Actualizado'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new Reporte());

        $form->select('persona_id', __('Persona'))->options(Persona::all()->pluck('nombre', 'id'));
        $form->textarea('descripcion', __('Descripción'));

        return $form;
    }

   public function export()
{
    // return Excel::download(new ReporteExport, 'reportes.xlsx');
}
}
