<?php

namespace App\Search;

use App\Models\Users\User;

class SelectSubjectDetails
{
  public function resultUsers($keyword, $category, $updown, $gender, $role, $subjects)
  {
    return User::whereHas('subjects', function ($q) use ($subjects) {
      $q->whereIn('subjects.id', $subjects);
    })->get();
  }
}
