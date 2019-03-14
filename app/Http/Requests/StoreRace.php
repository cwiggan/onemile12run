<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRace extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:races',
            'price' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'description' => 'required',
            'awards' => 'required',
        ];
    }
}
