<?php

namespace App\Http\Requests\Admin\Permissions;

use App\Models\Admin\Role;
use Illuminate\Foundation\Http\FormRequest;

class EditPermissionRequest extends FormRequest
{
    public function authorize()
    {

        return true;

    }
    
    public function rules()
    {
        return [
            'name' => 'required|max:50|unique:permissions,name,' . $this->id,
            'slug' => 'required|max:50'
        ];
    }
}
