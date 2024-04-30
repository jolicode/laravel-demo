<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
                Rule::unique('posts')->where(function ($query) {
                    return $query->where('slug', Str::slug($this->input('title'), language: app()->getLocale()));
                }),
            ],
            'summary' => 'required|string|max:255',
            'content' => 'required|string|min:10',
        ];
    }

    public function messages(): array
    {
        return [
            'title.unique' => 'post.slug_unique',
            'summary.required' => 'post.blank_summary',
            'content.required' => 'post.blank_content',
            'content.min' => 'post.too_short_content',
        ];
    }
}
