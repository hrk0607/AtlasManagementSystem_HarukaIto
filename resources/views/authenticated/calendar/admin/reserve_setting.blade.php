<x-sidebar>
  <div class="calendar-wrapper">
    <div class="calendar-inner">
      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <p>{!! $calendar->render() !!}</p>
      <div class="adjust-table-btn m-auto text-right">
        <input type="submit" class="btn btn-primary" value="登録" form="reserveSetting" onclick="return confirm('登録してよろしいですか？')">
      </div>
    </div>
  </div>
</x-sidebar>
