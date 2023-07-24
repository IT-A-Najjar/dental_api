<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IllnessesStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
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
                'name' => 'required|string|max:258',
            ];
        } else {
            return [
                'name' => 'required|string|max:258',
            ];
        }
    }

    public function messages(): array
    {
        if (request()->isMethod('post')) {
            return [
                'name' => 'Name is required!',
            ];
        } else {
            return [
                'name' => 'Name is required!',
            ];
        }
    }
}
