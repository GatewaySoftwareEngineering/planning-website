<?php

namespace App\Http\Requests\Tasks;

use App\Rules\OneOfBoardStatuses;
use Illuminate\Foundation\Http\FormRequest;

class TaskMoveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('move', request('task'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'status_id' => ['required','exists:statuses,id', new OneOfBoardStatuses()]
        ];
    }
}
