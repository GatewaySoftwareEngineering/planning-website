<?php

namespace App\Http\Requests\Statuses;

use App\Models\Status;
use Illuminate\Foundation\Http\FormRequest;

class StatusIndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('browse', Status::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'     => ['nullable', 'string'],
            'limit'    => ['nullable', 'integer'],
            'page'     => ['nullable', 'integer'],
        ];
    }
}
