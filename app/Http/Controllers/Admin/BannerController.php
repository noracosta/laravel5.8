<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Menus\CreateMenuRequest;
use App\Http\Requests\Admin\Menus\EditMenuRequest;
use App\Models\Admin\Menu;
use App\Repositories\Admin\MenuRepository;
use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
{
    
    private $menuRepository;

    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public function index()
    {
        can('ver-banner');
        return view('admin.banners.index');
    }

    public function list()
    {
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
        return view('admin.menus.create');
    }

    public function store(CreateMenuRequest $request)
    {
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
        return view('admin.menus.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }

    public function update(Menu $menu, EditMenuRequest $request)
    {
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
        return view('admin.menus.delete', compact('menu'));
    }
    
    public function destroy(Menu $menu)
    {
        $this->menuRepository->delete($menu);

        flash('Registro de menú eliminado.')->success()->important();

        return redirect()->route('menus.index');
    }

    public function update_order(Request $request)
    {
        if ($request->ajax()) {
            $menu = new Menu;
            $menu->updateOrder($request->menu);
            return response()->json(['respuesta' => 'ok']);
        } else {
            abort(404);
        }
    }

}
