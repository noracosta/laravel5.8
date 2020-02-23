<?php

namespace App\Http\Requests\Admin\Menus;

use App\Models\Admin\Menu;
use Illuminate\Foundation\Http\FormRequest;

class CreateMenuRequest extends FormRequest
{
    public function authorize()
    {

        return true;

    }
    
    public function rules()
    {
        return [
            'name' => 'required|max:50|unique:menus,name',
            'url' => 'required|max:50|unique:menus,url',
            'icon' => 'nullable|max:50'
        ];
    }
}
