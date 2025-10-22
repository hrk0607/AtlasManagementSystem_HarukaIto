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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $birth_date = request()->old_year . '-' . request()->old_month . '-' . request()->old_day;

        return [
            'over_name' => 'required|string|max:10',
            'under_name' => 'required|string|max:10',
            'over_name_kana' => 'required|string|max:30|regex:/^[ァ-ヶ]+$/u',
            'under_name_kana' => 'required|string|max:30|regex:/^[ァ-ヶ]+$/u',
            'mail_address' => 'required|email|max:100|unique:users,mail_address',
            'sex' => 'required|in:男性,女性,その他',
            'birth_date' => 'required|date|after_or_equal:2000-01-01|after_or_equal:2000-01-01',
            'role' => 'required|in:講師（国語）,講師（数学）,教師（英語）,生徒',
            'password' => 'required|min:8|max:30|confirmed',
        ];
    }
}
