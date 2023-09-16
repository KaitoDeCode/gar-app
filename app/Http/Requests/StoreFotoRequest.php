<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFotoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'album_id' =>'required',
            'deskripsi'=>'required|max:800|string',
            'file_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'visibility' => 'required',
        ];

    }

    public function messages(): array{
        return[
            "title.required"=>"data tidak ada yang boleh kosong",
            "deskripsi.required"=>"data tidak ada yang boleh kosong",
            "file_image.required"=>"data tidak ada yang boleh kosong",
            "visibility.required"=>"data tidak ada yang boleh kosong",
            "file_image.max"=>"data tidak boleh melebihi 2mb",
            "file_image.image"=>"File harus gambar  ",
        ];
    }
}
