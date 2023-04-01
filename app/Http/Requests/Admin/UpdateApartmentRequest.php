<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateApartmentRequest extends FormRequest
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
            //'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            // 'latitude' => 'required',
            // 'longitude' => 'required',
            'cover_img' => 'file|image',
            'description' => 'string|max:1000',
            'rooms_qty' => 'required|integer',
            'beds_qty' => 'required|integer',
            'bathrooms_qty' => 'required|integer',
            'mq' => 'integer',
            'daily_price' => 'required|numeric',
            'visible' => 'nullable|boolean',
            'services' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images' => 'max:4',
        ];
    }
}
