<?php

namespace App\Search;

use App\Models\Users\User;

class SelectIds implements DisplayUsers
{

  // 改修課題：選択科目の検索機能
  public function resultUsers($keyword, $category, $updown, $gender, $role, $subjects)
  {
    if (is_null($gender)) {
      $gender = ['1', '2', '3'];
    } else {
      $gender = array($gender);
    }

    if (is_null($role)) {
      $role = ['1', '2', '3', '4'];
    } else {
      $role = array($role);
    }

    $query = User::with('subjects')
      ->whereIn('sex', $gender)
      ->whereIn('role', $role);

    if (!empty($keyword)) {
      $query->where('id', $keyword);
    }

    // ★ subject 絞り込み追加
    if (!empty($subjects)) {
      $query->whereHas('subjects', function ($q) use ($subjects) {
        $q->whereIn('subjects.id', $subjects);
      });
    }

    return $query->orderBy('id', $updown)->get();
  }
}
