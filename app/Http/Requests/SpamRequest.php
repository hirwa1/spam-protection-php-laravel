<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpamRequest extends FormRequest
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
            //
            'source' => 'required|max:255',
            'message' => 'required|max:255',
            'state' => 'required|max:255',
            'report_type' => 'required|max:255',
            'referenceResourceType' => 'required|max:255',
        ];
    }
}
