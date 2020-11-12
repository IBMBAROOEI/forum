<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class threadrequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
        ];
    }
//    public function messages()
//    {
//        return[
//            'title.required' => 'مقدار خالی است',
//            'content.required'  => 'مقدار خالی است',
//            'chanel_id.required'=>'مقدار خالی است'
//        ];
//    }
}







/* if want use validesion persion */
//public function rules()
//{
//    return [
//        'title' => 'required',
//        'content' => 'required',
//        'chanel_id'=>'required'
//    ];
//}
//public function messages()
//{
//    return[
//        'title.required' => 'مقدار خالی است',
//        'content.required'  => 'مقدار خالی است',
//        'chanel_id.required'=>'مقدار خالی است'
//    ];
//}
//}