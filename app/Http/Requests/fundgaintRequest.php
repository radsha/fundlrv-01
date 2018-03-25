<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class fundgaintRequest extends Request
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

   
          'glname' => 'required',
          'glpinid' => 'required',
          'gladdress' => 'required',
          'glbdate' => 'required',
          'glno' => 'required',
          'mbmember' => 'required',
          'idoffice' => 'required',
          'keydata' => 'required',
          'samano' => 'required',


        ];
    }

    public function messages()
    {
        return [


          'glname.required' => 'กรุณาป้อน',
          'glpinid.required' => 'กรุณาป้อน',
          'gladdress.required' => 'กรุณาป้อน',
          'glbdate.required' => 'กรุณาป้อน',
          'glno.required' => 'กรุณาป้อน',
          'mbmember.required' => 'กรุณาป้อน',
          'idoffice.required' => 'กรุณาป้อน',
          'keydata.required' => 'กรุณาป้อน',
          'samano.required' => 'กรุณาป้อน',



        ];
    }

}
