<?php

namespace App\Search;

use App\Models\Users\User;

class AllUsers implements DisplayUsers
{

  public function resultUsers($keyword, $category, $updown, $gender, $role, $subjects)
  {
    $query = User::with('subjects');

    // ★ subject 絞り込み
    if (!empty($subjects)) {
      $query->whereHas('subjects', function ($q) use ($subjects) {
        $q->whereIn('subjects.id', $subjects);
      });
    }

    return $query->get();
  }
}
