<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerEventeeRequest extends FormRequest
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
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'password' => 'required|min:6',
            'job_title' => 'required',
            'country' => 'required',
        ];
    }
}
