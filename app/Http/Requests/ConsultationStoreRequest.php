<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultationStoreRequest extends FormRequest
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
        if (request()->isMethod('post')) {
            return [
                'content' => 'required|string|max:258',
                'is_viwe' => 'required|boolean',
            ];
        } else {
            return [
                'content' => 'required|string|max:258',
                'is_viwe' => 'required|boolean',
            ];
        }
    }
    public function messages(): array
    {
        if (request()->isMethod('post')) {
            return [
                'content' => 'Content is required!',
                'is_viwe'=>'boolean',
            ];
        } else {
            return [
                'content' => 'Content is required!',
                'is_viwe'=>'boolean',
            ];
        }
    }
}
