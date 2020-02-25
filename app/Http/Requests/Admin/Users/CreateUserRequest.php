<?php

namespace App\Http\Requests\Admin\Users;

use App\Models\Admin\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {

        return true;

    }
    
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8',
            'password_confirm' => 'required|same:password',
            'role_id' => 'required|array',    
        ];
    }
}
