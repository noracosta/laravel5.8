<?php

namespace App\Http\Requests\Admin\Menus;

use App\Models\Admin\Menu;
use Illuminate\Foundation\Http\FormRequest;

class EditMenuRequest extends FormRequest
{
    public function authorize()
    {

        return true;

    }
    
    public function rules()
    {
        return [
            'name' => 'required|max:50|unique:menus,name,' . $this->id,
            'url' => 'required|max:50||unique:menus,url,' . $this->id,
            'icon' => 'nullable|max:50'
        ];
    }
}
