<?php

namespace sistemaLaravel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ElencoFormRequest extends FormRequest
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
            'ID'=>'required',
            'ID_ACADEMIA'=>'required|max:50',
            'NOME'=>'required|max:50',
            'DT_NASCIMENTO'=>'required|max:10',
            'RG'=>'required|max:512',
            'RG_ANEXO'=>'mimes:jpeg,bmp,png',


        ];
    }
}
