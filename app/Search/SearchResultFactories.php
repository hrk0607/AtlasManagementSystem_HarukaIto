<?php

namespace App\Search;

use App\Models\Users\User;

class SearchResultFactories
{

  public function initializeUsers($keyword, $category, $updown, $gender, $role, $subjects)
  {
    $query = User::query();

    // キーワード検索
    if (!empty($keyword)) {
      $query->where(function ($q) use ($keyword) {
        $q->where('over_name', 'like', '%' . $keyword . '%')
          ->orWhere('under_name', 'like', '%' . $keyword . '%')
          ->orWhere('over_name_kana', 'like', '%' . $keyword . '%')
          ->orWhere('under_name_kana', 'like', '%' . $keyword . '%')
          ->orWhere('mail_address', 'like', '%' . $keyword . '%');
      });
    }

    // 性別
    if (!empty($gender)) {
      $query->where('sex', $gender);
    }

    // 役割
    if (!empty($role)) {
      $query->where('role', $role);
    }

    // ▼▼▼ ココ！！ subjects が効かない原因はここ ▼▼▼
    if (!empty($subjects) && is_array($subjects)) {
      $query->whereHas('subjects', function ($q) use ($subjects) {
        $q->whereIn('subjects.id', $subjects);
      });
    }

    // 並び順
    if (!empty($updown)) {
      $query->orderBy('id', $updown);
    }

    return $query->get();
  }
}
