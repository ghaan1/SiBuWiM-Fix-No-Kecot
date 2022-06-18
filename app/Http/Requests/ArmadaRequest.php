<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArmadaRequest extends FormRequest
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
            'nama' => 'required',
            'stock' => 'required',
            'tarif' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama armada harus diisi',
            'stock.required' => 'Jumlah armada harus diisi',
            'tarif.required' => 'Tarif harus diisi',
        ];
    }
}