<?php

namespace App\Http\Requests\Tasks;

use App\Rules\OneOfBoardLabels;
use App\Rules\OneOfBoardMembers;
use App\Rules\OneOfBoardStatuses;
use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create', Task::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'status_id'    => ['nullable', 'exists:statuses,id', new OneOfBoardStatuses()],
            'assignee_id'  => ['nullable', 'exists:statuses,id', new OneOfBoardMembers()],
            'title'        => ['required', 'string'],
            'description'  => ['nullable', 'string'],
            'image'        => ['nullable', 'string'],
            'due_date'     => ['required', 'date'], 'after_or_equal:today',
            'labels'       => ['nullable', 'array'],
            'labels.*.id'  => ['required', new OneOfBoardLabels()]
        ];
    }
}
