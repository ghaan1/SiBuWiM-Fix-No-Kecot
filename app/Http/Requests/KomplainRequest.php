<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KomplainRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required',
            'judul' => 'required',
            'jenis_komplain' => 'required',
            'isi' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'judul.required' => 'Judul komplain harus diisi',
            'jenis_komplain.required' => 'Jenis komplain harus dipilih',
            'isi.required' => 'Isi komplain harus diisi',
        ];
    }
}