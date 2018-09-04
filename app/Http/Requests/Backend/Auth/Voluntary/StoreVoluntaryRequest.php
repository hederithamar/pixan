<?php

namespace App\Http\Requests\Backend\Auth\Voluntary;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreVoluntaryRequest.
 */
class StoreVoluntaryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isExecutive();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'celphone'     => 'required|max:191',
            'sexo'  => 'required|max:191',
        ];
    }
}
