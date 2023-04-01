<?php

namespace App\Http\Requests\Admin;

use App\Models\Service;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreApartmentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {

        return [
            'title' => 'required|string|max:255',

            /* devo fare un controllo: se non ci sono lat e long allora devo dire che address non è valido */
            'address' => 'required|string|max:255',
            'latitude' => 'required',
            'longitude' => 'required',
            'cover_img' => 'nullable|file|image',
            'description' => 'nullable|string|max:1000',
            'rooms_qty' => 'required|integer',
            'beds_qty' => 'required|integer',
            'bathrooms_qty' => 'required|integer',
            'mq' => 'nullable|integer',
            'daily_price' => 'required|numeric',
            'visible' => 'nullable|boolean',
            'services' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images' => 'max:4',
        ];
    }
    public function messages(): array
    {
        return [
            'address.required' => '',
            'latitude.required' => 'enter a valid address',
            'longitude.required' => '',
        ];
    }
}