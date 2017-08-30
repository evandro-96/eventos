<?php

namespace sistemaLaravel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use sistemaLaravel\Http\Requests\Request;

class CoreografiaFormRequest extends FormRequest
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
            'nomecoreografia'=>'required|max:256',
            'id_academia'=>'max:256',
            'ACADEMIA'=>'max:256',
            'classificacao'=>'max:256',
            'modalidade'=>'max:256',
            'categoria'=>'max:256',
            'duracao'=>'max:256',
            'participacao'=>'max:256',
            'musica'=>'max:256',
            'arquivo_musica'=>'mimes:mp3',
            'coreografo'=>'max:256',
            'link_youtube'=>'max:256',
            'confirmada'=>'max:256',
            'dataapresentacao'=>'max:10',
        ];
    }
}
