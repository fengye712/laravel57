<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
use Auth;
use Hash;
class AdminPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->addValidator();
        return [
            'origin_pass' => 'sometimes|required|check_pass',
            'password' => 'sometimes|required|confirmed',
            'password_confirmation' => 'sometimes|required',
        ];
    }
    public function addValidator()
    {
        Validator::extend('check_pass', function ($attribute, $value, $parameters, $validator) {
           return  Hash::check($value,Auth::guard('admin')->user()->password);
        });
    }
    /**
     * @return array
     */
    public function messages()
    {
        return [
            'origin_pass.required' => '原密码不能为空',
            'origin_pass.check_pass' => '原密码不对',
            'password.required'  => '新密码不能为空',
            'password.confirmed'  => '两次密码不一致',
            'password_confirmation.required'  => '确认密码不能为空',
        ];
    }
}
