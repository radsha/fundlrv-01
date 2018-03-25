<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class fundtype_deRequest extends Request
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
          				'accsaha'   => 'required',
          				'numpay'    => 'required',
          				'moneyname' => 'required',
          				'signature' => 'required',
                ];
    }

    public function messages()
    {
              return [
                			'accsaha.required'   => 'กรุณาป้อน',
                			'numpay.required'    => 'กรุณาป้อน',
                			'moneyname.required' => 'กรุณาป้อน',
                			'signature.required' => 'กรุณาป้อน',
                      ];
    }
}
