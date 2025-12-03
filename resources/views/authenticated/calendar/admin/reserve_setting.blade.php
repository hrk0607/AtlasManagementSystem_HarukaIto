<x-sidebar>
  <div class="calendar-wrapper">
    <div class="calendar-inner">
      <p class="text-center" style="font-size: 20px;">{{ $calendar->getTitle() }}</p>
      <div class=" calendar-box">
        <p>{!! $calendar->render() !!}</p>
        <div class="text-right">
          <input type="submit" class="btn btn-primary" value="登録" form="reserveSetting" onclick="return confirm('登録してよろしいですか？')">
        </div>
      </div>
    </div>
  </div>
</x-sidebar>
