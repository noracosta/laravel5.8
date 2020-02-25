<?php

namespace App\Http\Requests\Admin\Permissions;

use App\Models\Admin\Permission;
use Illuminate\Foundation\Http\FormRequest;

class CreatePermissionRequest extends FormRequest
{
    public function authorize()
    {

        return true;

    }
    
    public function rules()
    {
        return [
            'name' => 'required|max:50|unique:permissions,name',
            'slug' => 'required|max:50'
        ];
    }
}
