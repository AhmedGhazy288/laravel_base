<?php

namespace IconTs\Base\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExportRequest extends FormRequest
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
            'q' => ['nullable', 'string', 'min:3'],

            'id' => [
                'nullable',
                'exists:orders,id',
            ],

            'simple' => [
                'nullable',
                'in:0,1'
            ],
            'page' => ['required', 'numeric', 'integer', 'min:1'],
            'field' => ['nullable', 'string'],
            'dir' => ['nullable', 'in:asc,desc'],
            "from" => [
                "nullable",
                "date",
            ],
            "to" => [
                "nullable",
                "date",
            ],
        ];
    }
}
