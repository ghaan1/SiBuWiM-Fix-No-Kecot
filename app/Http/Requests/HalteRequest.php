<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HalteRequest extends FormRequest
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
            'produk_id' => 'required',
            'nama' => 'required',
            'kota' => 'required',
            'provinsi' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'produk_id.required' => 'Rute harus diisi',
            'nama.required' => 'Nama halte harus diisi',
            'kota.required' => 'Kota harus diisi',
            'provvinsi.required' => 'Provinsi harus diisi',
        ];
    }
}