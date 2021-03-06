<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreCancelReasonRequest extends FormRequest
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
    public function rules(Request $request)
    {
        if($_POST){
            return [
                'reason'  => 'required|unique:cancel_reasons,reason,'.(isset($request->id)?$request->id:''),
                'status' => 'required',
                'cancelled_by' => 'required'
            ];
        }
        return [];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'reason'    => 'Reason',
            'status'  => 'Status',
            'cancelled_by' => 'Cancelled By'
        ];
    }
}
