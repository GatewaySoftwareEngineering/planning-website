<?php

namespace App\Http\Requests\Users;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can('update', User::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'          => ['nullable', 'string'],
            'email'         => ['nullable', 'email', Rule::unique('users')->ignore($this->user)],
            'password'      => ['nullable', 'string'],
            'role_id'       => ['nullable', 'integer', 'exists:roles,id'],
            'is_active'     => ['nullable', 'boolean']
        ];
    }
}
