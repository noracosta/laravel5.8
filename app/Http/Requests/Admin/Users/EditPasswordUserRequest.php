<?php

namespace App\Http\Requests\Admin\Users;

use App\Models\Admin\User;
use Illuminate\Foundation\Http\FormRequest;

class EditPasswordUserRequest extends FormRequest
{
    public function authorize()
    {

        return true;

    }
    
    public function rules()
    {
        return [            
            'password' => 'required|min:8',
            'password_confirm' => 'required|same:password',
        ];
    }
}
