<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        'reserve_at' => 'required|max:10',
        'time' => 'required|max:10'
        ];
    }
    public function attributes() {
        return [
        'reserve_at' => '予約日',
        'time' => '時間帯'
        ];
    }
}
