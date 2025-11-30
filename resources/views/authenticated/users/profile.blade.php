<x-sidebar>
  <p style="margin-top: 1rem; margin-left: 1rem;margin-bottom:4rem;"><span>{{ $user->over_name }}</span><span>{{ $user->under_name }}さんのプロフィール</p>
  <div class="calendar-wrapper">
    <div class="calendar-inner">
      <div class="user_status p-3">
        <p>名前 : <span>{{ $user->over_name }}</span><span class="ml-1">{{ $user->under_name }}</span></p>
        <p>カナ : <span>{{ $user->over_name_kana }}</span><span class="ml-1">{{ $user->under_name_kana }}</span></p>
        <p>性別 : @if($user->sex == 1)<span>男</span>@else<span>女</span>@endif</p>
        <p>生年月日 : <span>{{ $user->birth_day }}</span></p>
        <div>選択科目 :
          @foreach($user->subjects as $subject)
          <span>{{ $subject->subject }}</span>
          @endforeach
        </div>

        <div class="subject_edit mt-3" data-bs-toggle="collapse" data-bs-target="#subjectInner" aria-expanded="false" style="cursor: pointer;">
          <span class="subject_edit_btn">選択科目の編集</span>
          <i class="arrow-icon  fa fa-chevron-down" style="color:#03AAD2; pointer-events:none;"></i>
        </div>

        <div class="collapse subject_inner mt-2" id="subjectInner">
          <form action="{{ route('user.edit') }}" method="post">
            @foreach($subject_lists as $subject_list)
            <div>
              <label>{{ $subject_list->subject }}</label>
              <input type="checkbox" name="subjects[]" value="{{ $subject_list->id }}">
            </div>
            @endforeach
            <input type="submit" value="編集" class="btn btn-primary">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            {{ csrf_field() }}
          </form>
        </div>

      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </div>
</x-sidebar>
