<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Menus\CreateMenuRequest;
use App\Http\Requests\Admin\Menus\EditMenuRequest;
use App\Models\Admin\Menu;
use App\Repositories\Admin\MenuRepository;
use Yajra\DataTables\Facades\DataTables;

class MenuController extends Controller
{
    
    private $menuRepository;

    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public function index()
    {
        can('ver-menu');

        return view('admin.menus.index');
    }

    public function list()
    {
        can('ver-menu');

        $menus = Menu::getMenu();

        return view('admin.menus.list', compact('menus'));
    }

    public function index_data()
    {
        
        $menus = $this->menuRepository->find_all();
        
        return Datatables::of($menus)

            ->addColumn('action', function ($menu) {

                return view('admin.menus.partials.actions-datatables', compact('menu'))

                    ->render();
            })

            ->make(true);
    }

    public function create()
    {
        can('agregar-menu');

        return view('admin.menus.create');
    }

    public function store(CreateMenuRequest $request)
    {
        can('agregar-menu');

        $data = $request->validated();

        if (! $this->menuRepository->create($data)) {

            flash('No se pudo crear el registro de menú.')->error();

            return back();
        }

        flash('Registro de menú creado.')->success()->important();

        return redirect()->route('menus.index');
    }

    public function show(Menu $menu)
    {
        can('ver-menu');

        return view('admin.menus.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        can('editar-menu');

        return view('admin.menus.edit', compact('menu'));
    }

    public function update(Menu $menu, EditMenuRequest $request)
    {
        can('editar-menu');

        $data = $request->validated();

        if (! $this->menuRepository->edit($menu, $data)) {

            flash('No se pudo editar el registro de menú.')->error();

            return back();
        }

        flash('Registro de menú actualizado.')->success()->important();

        return redirect()->back();
    }

    public function delete(Menu $menu)
    {
        can('eliminar-menu');

        return view('admin.menus.delete', compact('menu'));
    }
    
    public function destroy(Menu $menu)
    {
        can('eliminar-menu');

        $this->menuRepository->delete($menu);

        flash('Registro de menú eliminado.')->success()->important();

        return redirect()->route('menus.index');
    }

    public function update_order(Request $request)
    {
        can('editar-menu');
        
        if ($request->ajax()) {

            $menu = new Menu;

            $menu->updateOrder($request->menu);

            return response()->json(['respuesta' => 'ok']);

        } else {

            abort(404);
            
        }
    }

}
