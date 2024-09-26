<?php
namespace App\Admin\Controllers;

use App\Models\Mantenimiento;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use App\Exports\MantenimientoExport;
use Maatwebsite\Excel\Facades\Excel;

class MantenimientoController extends AdminController
{
    protected $title = 'Mantenimientos';

    protected function grid()
    {
        $grid = new Grid(new Mantenimiento());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('sector', __('Sector'));
        $grid->column('descripcion', __('Descripción'));
        $grid->column('costo_aproximado', __('Costo Aproximado'));
        $grid->column('created_at', __('Creado'))->sortable();
        $grid->column('updated_at', __('Actualizado'))->sortable();

        $grid->tools(function ($tools) {
            $tools->append('<a href="/admin/mantenimientos/export" class="btn btn-sm btn-success">Exportar a Excel</a>');
        });

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(Mantenimiento::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('sector', __('Sector'));
        $show->field('descripcion', __('Descripción'));
        $show->field('costo_aproximado', __('Costo Aproximado'));
        $show->field('created_at', __('Creado'));
        $show->field('updated_at', __('Actualizado'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new Mantenimiento());

        $form->text('sector', __('Sector'));
        $form->textarea('descripcion', __('Descripción'));
        $form->number('costo_aproximado', __('Costo Aproximado'));

        return $form;
    }

    public function export()
    {
        // return Excel::download(new MantenimientoExport, 'mantenimientos.xlsx');
    }
}