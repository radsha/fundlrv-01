<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class fundincomeRequest extends Request
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

          
          'numbook1' => 'required',
          'numbook2' => 'required',
          'payment1' => 'required',
          'payment2' => 'required',
          'payment3' => 'required',
          'payment4' => 'required',

         ];
    }

    public function messages()
    {
        return [


        'numbook1.required' => 'กรุณาป้อน',
        'numbook2.required' => 'กรุณาป้อน',
        'payment1.required' => 'กรุณาป้อน',
        'payment2.required' => 'กรุณาป้อน',
        'payment3.required' => 'กรุณาป้อน',
        'payment4.required' => 'กรุณาป้อน',




        ];
    }

}
