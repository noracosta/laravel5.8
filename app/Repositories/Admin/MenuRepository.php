<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Menu;

use Illuminate\Support\Facades\DB;

class MenuRepository
{
    public function find_all()
    {
       return Menu::select('id','menu_id','name','url','order','icon');
    }

    public function create(array $data)
    {
        return Menu::create($data);
    }

    public function edit(Menu $menu, array $data)
    {
        return $menu->update($data);
    }

    public function delete(Menu $menu)
    {
        $menu->delete();
    }
}