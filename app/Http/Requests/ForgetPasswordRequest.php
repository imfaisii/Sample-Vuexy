<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgetPasswordRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'exists:users,email', 'unique:password_resets,email,NULL,NULL,deleted_at,NULL'],
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Please Provide us your Email!',
            'email.exists' => 'Looks Like, You are new here.Go register yourself first!'
        ];
    }
}
