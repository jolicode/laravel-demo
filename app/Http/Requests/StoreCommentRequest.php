<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Comment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('create', Comment::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'content' => [
                'required',
                'string',
                'min:5',
                'max:10000',
                function ($attribute, $value, $fail) {
                    if (str_contains($value, '@')) {
                        $fail('comment.is_spam.');
                    }
                },
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'comment.blank',
            'content.min' => 'comment.too_short',
            'content.max' => 'comment.too_long',
        ];
    }
}
