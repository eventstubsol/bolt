<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\dataCheck;

class SessionFormRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required|max:10000',
            'type' => 'required',
            'room_id' => 'required',
            'start_time' => ['required'],
            'end_time' => ['required',new dataCheck(\Request()->start_time)]

        ];
    }
}
