<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCPenerima extends FormRequest
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
            'nis' => 'required|max:20|regex:[[0-9]+]|unique:cpenerima',
            'nama' => 'required|max:50',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' =>  'required',
            'telp' => 'required|max:20|regex:[[0-9]+]'
        ];
    }
}
