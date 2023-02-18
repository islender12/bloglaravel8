<?php

namespace App\Http\Requests;

// Request del formulario de contactanos
use Illuminate\Foundation\Http\FormRequest;

class sendemailrequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'asunto' => 'required',
            'descripcion' => 'required'
        ];
    }
}
