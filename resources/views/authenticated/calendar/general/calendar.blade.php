<x-sidebar>
  <div class="calendar-wrapper">
    <div class="calendar-inner">
      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div class="calendar-box">
        {!! $calendar->render() !!}
      </div>
      <div class="text-right w-75 m-auto">
        <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts" style="margin-top:1rem;">
      </div>
    </div>
  </div>
</x-sidebar>
