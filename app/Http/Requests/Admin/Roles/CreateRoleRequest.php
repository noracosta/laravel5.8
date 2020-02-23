<?php

namespace App\Http\Requests\Admin\Roles;

use App\Models\Admin\Role;
use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
{
    public function authorize()
    {

        return true;

    }
    
    public function rules()
    {
        return [
            'name' => 'required|max:50|unique:roles,name'
        ];
    }
}
