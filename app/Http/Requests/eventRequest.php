<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class eventRequest extends FormRequest
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
            'event_name' => 'required',
            'event_type' => 'required',
            'event_scope' => 'required',
            'event_city' => 'required',
            'event_country' => 'required',
            'start_date' => 'required',
            'finish_date' => 'required',
            'event_desc' => 'required'
        ];
    }
}
