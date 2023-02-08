<?php

namespace App\Http\Requests\Users;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserIndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can('browse', User::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'    => ['nullable', 'string'],
            'email'   => ['nullable', 'string'],
            'role_id' => ['nullable', 'integer'],
            'limit'   => ['nullable', 'integer'],
            'page'    => ['nullable', 'integer']
        ];
    }
}
