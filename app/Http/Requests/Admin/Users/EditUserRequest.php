<?php

namespace App\Http\Requests\Admin\Users;

use App\Models\Admin\User;
use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{
    public function authorize()
    {

        return true;

    }
    
    public function rules()
    {
        return [            
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->id,
            'role_id' => 'required|integer',  
        ];
    }
}
