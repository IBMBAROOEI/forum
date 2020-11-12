<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
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
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'roles' => 'required',
            'permissions' => 'required'
        ];
    }
}


/* if want you validatin persion
    return [
        'name' => 'required',
        'lastname' => 'required',
      'email' => 'required|email|unique:users,email',
        'password'=>'required', 'string', 'min:8', 'confirmed',
        'roles' => 'required',
        'permissions'=>'required'
    ];
}
public function messages()
{
    return[
        'name.required' => 'نام وارد نکردید',
        'lastname.required'  => 'نام خانوداگی وارد نکردید',
         'email.required' => 'وارد کردن ایمیل الزامی است!',
        'email.email.required' => 'آدرس ایمیل معتبر نمی باشد!',
        'password.required'=>'پسورد رو وارد نکردید',
        'password_confirmation.required' =>'پسورد مطابق نیست',
        'roles.required' => 'نقش کاربرو تعیین نکردید',
        'permissions.required'=>'مجوز کاربرو تعیین نکردید'

    ]; */
