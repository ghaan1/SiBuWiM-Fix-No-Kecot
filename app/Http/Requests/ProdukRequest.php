<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukRequest extends FormRequest
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
            'kategori_id' => 'required',
            'armada_id' => 'required',
            'nama' => 'required',
            'nama_tujuan' => 'required',
            'waktu_tempuh' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|mimes:png,jpg,jpeg|max:5012',
        ];
    }

    public function messages()
    {
        return [
            'kategori_id.required' => 'Kategori harus diisi',
            'armada_id.required' => 'Armada harus diisi',
            'nama.required' => 'Asal harus diisi',
            'nama_tujuan.required' => 'Tujuan harus diisi',
            'waktu_tempuh.required' => 'Lama perjalanan harus diisi',
            'harga.required' => 'Tarif harus diisi',
            'stok.required' => 'Ketersediaan harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'gambar.required' => 'Gambar harus diisi',
            'gambar.max' => 'Ukuran gambar maksimal 5MB',
            'gambar.mimes' => 'Gambar harus berupa JPG | PNG | JPEG',
        ];
    }
}