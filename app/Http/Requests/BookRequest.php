<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255|unique:books,title',
            'author' => 'required|string|max:255',
            'pages' => 'required|integer|min:1|max:10000', 
            'price' => 'required|numeric|min:1|max:99999.99',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The book title is required.',
            'title.unique' => 'This book title already exists.',
            'author.required' => 'The author name is required.',
            'pages.required' => 'The number of pages is required.',
            'pages.integer' => 'Pages must be a valid number.',
            'pages.min' => 'A book must have at least 1 page.',
            'pages.max' => 'A book cannot have more than 10,000 pages.',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a valid number.',
            'price.min' => 'The price must be at least 0.',
            'price.max' => 'The price cannot exceed 99,999.99.',
        ];
    }
}
