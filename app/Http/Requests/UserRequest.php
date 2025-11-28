<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'over_name' => 'required|string|max:10',
            'under_name' => 'required|string|max:10',
            'over_name_kana' => 'required|string|max:30|regex:/^[ァ-ヶ]+$/u',
            'under_name_kana' => 'required|string|max:30|regex:/^[ァ-ヶ]+$/u',
            'mail_address' => 'required|email|max:100|unique:users,mail_address',
            'sex' => 'required|in:1,2,3',
            'birth_date' => 'required|date|after_or_equal:2000-01-01|before_or_equal:' . now()->format('Y-m-d'),
            'role' => 'required|in:1,2,3,4',
            'password' => 'required|min:8|max:30|confirmed',
        ];
    }

    public function validationData()
    {
        $data = $this->all();
        if (
            !empty($data['old_year']) &&
            !empty($data['old_month']) &&
            !empty($data['old_day']) &&
            $data['old_year'] !== 'none' &&
            $data['old_month'] !== 'none' &&
            $data['old_day'] !== 'none'
        ) {
            $data['birth_date'] = $data['old_year'] . '-' . $data['old_month'] . '-' . $data['old_day'];
        } else {
            $data['birth_date'] = null;
        }

        return $data;
    }
}
