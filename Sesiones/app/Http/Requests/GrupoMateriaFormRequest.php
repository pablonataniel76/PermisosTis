<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupoMateriaFormRequest extends FormRequest
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
            'ID_DOCENTE'=>'required|max:11',
            'ID_MATERIA'=>'required|max:11',
            'GRUPO'=>'required|max:11',
            'ESTADO'=>'required|max:1',
        ];
    }
}
