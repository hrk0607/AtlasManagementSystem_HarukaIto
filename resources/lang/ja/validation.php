<?php

return [

  /*
    |--------------------------------------------------------------------------
    | バリデーション言語行
    |--------------------------------------------------------------------------
    */

  'accepted' => ':attributeを承認してください。',
  'active_url' => ':attributeが有効なURLではありません。',
  'after' => ':attributeには:date以降の日付を指定してください。',
  'after_or_equal' => ':attributeには:date以降または同日の日付を指定してください。',
  'alpha' => ':attributeはアルファベットのみがご利用できます。',
  'alpha_dash' => ':attributeは英数字とハイフン、アンダースコアのみがご利用できます。',
  'alpha_num' => ':attributeは英数字のみがご利用できます。',
  'array' => ':attributeは配列でなければなりません。',
  'before' => ':attributeには:date以前の日付を指定してください。',
  'before_or_equal' => ':attributeには:date以前または同日の日付を指定してください。',
  'between' => [
    'numeric' => ':attributeは:min〜:maxの間で指定してください。',
    'file' => ':attributeは:min〜:max KBの間で指定してください。',
    'string' => ':attributeは:min〜:max文字の間で指定してください。',
    'array' => ':attributeの項目は:min〜:max個で指定してください。',
  ],
  'boolean' => ':attributeは真または偽でなければなりません。',
  'confirmed' => ':attributeと確認フィールドが一致しません。',
  'date' => ':attributeは有効な日付ではありません。',
  'date_format' => ':attributeの形式は:formatと一致していません。',
  'different' => ':attributeと:otherには異なる値を指定してください。',
  'digits' => ':attributeは:digits桁でなければなりません。',
  'digits_between' => ':attributeは:min〜:max桁でなければなりません。',
  'email' => ':attributeは有効なメールアドレス形式で入力してください。',
  'exists' => '選択された:attributeは正しくありません。',
  'file' => ':attributeはファイルでなければなりません。',
  'filled' => ':attributeは必須です。',
  'image' => ':attributeは画像でなければなりません。',
  'in' => '選択された:attributeは正しくありません。',
  'integer' => ':attributeは整数でなければなりません。',
  'ip' => ':attributeは有効なIPアドレスでなければなりません。',
  'json' => ':attributeはJSON形式でなければなりません。',
  'max' => [
    'numeric' => ':attributeは:max以下でなければなりません。',
    'file' => ':attributeは:max KB以下のファイルでなければなりません。',
    'string' => ':attributeは:max文字以内で入力してください。',
    'array' => ':attributeの項目は:max個以下でなければなりません。',
  ],
  'min' => [
    'numeric' => ':attributeは:min以上でなければなりません。',
    'file' => ':attributeは:min KB以上のファイルでなければなりません。',
    'string' => ':attributeは:min文字以上で入力してください。',
    'array' => ':attributeの項目は:min個以上でなければなりません。',
  ],
  'not_in' => '選択された:attributeは正しくありません。',
  'numeric' => ':attributeは数値でなければなりません。',
  'present' => ':attributeは存在している必要があります。',
  'regex' => ':attributeの形式が正しくありません。',
  'required' => ':attributeは必須項目です。',
  'required_if' => ':otherが:valueの場合、:attributeは必須です。',
  'same' => ':attributeと:otherは一致していなければなりません。',
  'size' => [
    'numeric' => ':attributeは:sizeでなければなりません。',
    'file' => ':attributeは:size KBでなければなりません。',
    'string' => ':attributeは:size文字でなければなりません。',
    'array' => ':attributeの項目は:size個でなければなりません。',
  ],
  'string' => ':attributeは文字列でなければなりません。',
  'unique' => ':attributeはすでに使用されています。',
  'url' => ':attributeは有効なURL形式で入力してください。',
  'confirmed' => ':attributeの確認が一致しません。',

  /*
    |--------------------------------------------------------------------------
    | カスタムバリデーション属性名
    |--------------------------------------------------------------------------
    */

  'attributes' => [
    'over_name' => '姓',
    'under_name' => '名',
    'over_name_kana' => 'セイ',
    'under_name_kana' => 'メイ',
    'mail_address' => 'メールアドレス',
    'birth_date' => '生年月日',
    'password' => 'パスワード',
    'password_confirmation' => '確認用パスワード',
  ],

];
