<x-sidebar>
  <div class="calendar-wrapper">
    <div class="calendar-inner">
      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div class="calendar-box">
        <p>{!! $calendar->render() !!}</p>
      </div>
    </div>
  </div>
</x-sidebar>
