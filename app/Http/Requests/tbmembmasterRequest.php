<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class tbmembmasterRequest extends Request
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



         
            'idoffice' => 'required', 
            'member_no' => 'required', 
  /*          'memb_name' => 'required', 
            'membgroup' => 'required', 
            'member_date' => 'required', 
            'birth_date' => 'required', 
            'sex' => 'required', 
            'mariage' => 'required', 
            'mate_name' => 'required', 
            'tel' => 'required', 
            'telmobile' => 'required', 
            'email_address' => 'required', 
            'card_person' => 'required', 
            'position' => 'required', 
            'salary' => 'required', 
            'member_status' => 'required', 
            'resign_date' => 'required', 
            'address' => 'required', 
*/


        ];
    }

    public function messages()
{
    return [

      
        'idoffice.required' => 'กรุณาป้อน', 
        'member_no.required' => 'กรุณาป้อน', 
     /*   'memb_name.required' => 'กรุณาป้อน', 
        'membgroup.required' => 'กรุณาป้อน', 
        'member_date.required' => 'กรุณาป้อน', 
        'birth_date.required' => 'กรุณาป้อน', 
        'sex.required' => 'กรุณาป้อน', 
        'mariage.required' => 'กรุณาป้อน', 
        'mate_name.required' => 'กรุณาป้อน', 
        'tel.required' => 'กรุณาป้อน', 
        'telmobile.required' => 'กรุณาป้อน', 
        'email_address.required' => 'กรุณาป้อน', 
        'card_person.required' => 'กรุณาป้อน', 
        'position.required' => 'กรุณาป้อน', 
        'salary.required' => 'กรุณาป้อน', 
        'member_status.required' => 'กรุณาป้อน', 
        'resign_date.required' => 'กรุณาป้อน', 
        'address.required' => 'กรุณาป้อน', 
    */

    ];
}
}
