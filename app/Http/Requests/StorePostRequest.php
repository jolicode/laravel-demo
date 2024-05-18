<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
                'unique:posts,slug',
            ],
            'summary' => 'required|string|max:255',
            'content' => 'required|string|min:10',
            'published_at' => 'required|date|after:now',
        ];
    }

    public function messages(): array
    {
        return [
            'title.unique' => 'post.slug_unique',
            'slug.unique' => 'post.slug_unique',
            'summary.required' => 'post.blank_summary',
            'content.required' => 'post.blank_content',
            'content.min' => 'post.too_short_content',
            'published_at.after' => 'post.invalid_date',
        ];
    }
}
