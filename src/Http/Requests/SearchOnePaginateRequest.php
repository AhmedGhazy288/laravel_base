<?php

namespace IconTs\Base\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// ONE FOR SEARCHING BY ONE FIELD
class SearchOnePaginateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'q' => [
                'required',
                'string',
            ],
            'page' => ['required', 'numeric', 'integer', 'min:1'],
            'field' => ['nullable', 'string'],
            'dir' => ['nullable', 'in:asc,desc'],
        ];
    }
}
