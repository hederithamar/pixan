<?php

namespace App\Http\Requests\Backend\Auth\Product;

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
            'name'     => 'required|max:191',
            'description'  => 'required|max:191',
            'direccion' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'avatar_location' => 'sometimes|image|max:191',
        ];
    }
}
