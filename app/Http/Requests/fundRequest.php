<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class fundRequest extends Request
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
                  'mbapply' => 'required',
                  'mbprotech' => 'required',
                   'fname' => 'required',
        ];
    }

    public function messages()
    {
        return [
                  'mbapply.required' => 'กรุณาป้อนวันที่สมัคร',
                  'mbprotech.required' => 'กรุณาป้อนวันที่คุ้มครอง',
                  'fname.required' => 'กรุณาป้อนชื่อ-นามสกุลผู้สมัคร',


        ];
    }

}
