<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class News_bookRequest extends Request
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
            'bookyear' => 'required', 
            'bookname' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'bookyear.required' => 'กรุณาป้อนประจำปี', 
            'bookname.required' => 'กรุณาป้อนคำนำหน้า', 
        ];
    }
}
