<?php

namespace App\Http\Requests;

use App\Models\Game;
use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
            'title' => ['required', 'max:40', 'min:3', 'unique:'. Game::class],
            'description' => ['required', 'min:200', 'max:350'],
            'genre' => ['required', 'max:150', 'min:3'],
            'isforkids' => ['required', 'boolean'],
            'agerating' => ['required', 'max:50'],
            'cover_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'banner_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ];
    }
}
