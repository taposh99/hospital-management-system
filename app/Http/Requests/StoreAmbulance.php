<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAmbulance extends FormRequest
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
            'ambn'                    => 'required|unique:ambulances',
            'phone'                   => 'required',
            'district'                => 'required',
            'type'                    => 'required',
            'image'                   => 'required|mimes:jpeg,jpg,png'
        ];
    }

    //customizing the error message
    public function messages()
    {
        return [
            // 'ambn.required' => 'A title is required',
            // 'image.mimes'  => 'only jpeg, jpg, png',
        ];
    }

    //set the field name
    public function attributes()
    {
        return [
            'ambn' => 'ambulance number',
            'type' => 'ambulance type',
            'sell_price_inc_tax' => 'Sell price including tax',
        ];
    }

}
