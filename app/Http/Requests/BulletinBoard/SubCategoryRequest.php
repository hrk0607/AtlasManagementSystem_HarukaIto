<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'main_category_id' => 'required|exists:main_categories,id',
      'sub_category_name' => 'required|string|max:100|unique:sub_categories,sub_category',
    ];
  }

  public function messages()
  {
    return [
      'main_category_id.required' => 'メインカテゴリーを選択してください。',
      'main_category_id.exists' => '指定されたメインカテゴリーは登録されていません。',
      'sub_category_name.required' => 'サブカテゴリー名を入力してください。',
      'sub_category_name.string' => 'サブカテゴリー名は文字列で入力してください。',
      'sub_category_name.max' => 'サブカテゴリー名は100文字以内で入力してください。',
      'sub_category_name.unique' => 'このサブカテゴリーはすでに登録されています。',
    ];
  }
}
