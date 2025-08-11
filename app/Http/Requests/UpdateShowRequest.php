<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShowRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'details' => 'required',
            'duration_minutes' => 'required|numeric',
            'sponsors'=>'required|exists:sponsors,id',
            'data'=>'required|max:255',
            'manager'=>'required|max:255',
            'level'=>'required|numeric',
            'capacity'=>'required|numeric',
        ];
    }
}
