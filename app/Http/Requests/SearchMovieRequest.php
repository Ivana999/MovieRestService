<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchMovieRequest extends FormRequest
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
            'name' => ['nullable', 'string'],
            'release_year' => ['nullable', 'date'],
            'genre_id' => ['nullable', 'exists:genres,id'],
            'rate' => ['nullable', 'float'],
            'description' => ['nullable', 'text'],
            'actor_id' => ['nullable', 'exists:actors_directors,id'],
            'director_id' => ['nullable', 'exists:actors_directors,id'],
        ];
    }
}
