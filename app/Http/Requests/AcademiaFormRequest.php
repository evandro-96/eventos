<?php

namespace sistemaLaravel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use sistemaLaravel\Http\Requests\Request;

class AcademiaFormRequest extends FormRequest
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
            'ACADEMIA'=>'required|max:256',
            'NOMEDOGRUPO'=>'max:256',
            'ENDERECO'=>'max:256',
            'NUMERO'=>'max:256',
            'BAIRRO'=>'max:256',
            'CEP'=>'max:256',
            'PAIS'=>'max:256',
            'CIDADE'=>'max:256',
            'UF'=>'max:256',
            'EMAIL'=>'max:256',
            'TELEFONE'=>'max:256',
            'DIRETOR'=>'max:256',
            'CELULAR'=>'max:256',
            'USER'=>'max:256',
            'PASS'=>'max:256',
            'COMPROVANTE'=>'max:256',
            'PAGO'=>'max:256',
            'CPF'=>'max:256',
            'COMPROVANTECPF'=>'max:256'
        ];
    }
}
