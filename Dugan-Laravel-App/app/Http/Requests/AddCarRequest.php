<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCarRequest extends FormRequest
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
          'brand' => ['required', 'string', 'max:50'],
        'model' => ['required', 'string', 'max:50'],
        'year' => ['required', 'integer', 'between:1900,2099'],
        'transmission' => ['required', 'in:Manual,Automatic'],
        'fuel_type' => ['required', 'in:Gasoline,Diesel,Hybrid,Electric'],
        'price' => ['required', 'numeric', 'min:0'],
        'quantity' => ['nullable', 'integer', 'min:1'],
        'description' => ['nullable', 'string'],
        'image' => ['nullable', 'image', 'max:2048'], // ✅ This makes image optional and must be an image file
        ];
    }
}
