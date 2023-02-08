<?php

namespace App\Http\Requests\Tasks;

use App\Rules\ActiveUser;
use App\Rules\OneOfBoardMembers;
use Illuminate\Foundation\Http\FormRequest;

class TaskAssignRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('assign', request('task'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => ['required','exists:users,id', new OneOfBoardMembers(), new ActiveUser()]
        ];
    }
}
