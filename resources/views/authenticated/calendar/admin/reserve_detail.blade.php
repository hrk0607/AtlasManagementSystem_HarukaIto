<x-sidebar>
  <div class="w-75 m-auto h-75">
    <div class="calendar-wrapper">
      <p>
        <span>{{ $date }}</span>
        <span class="ml-3">{{ $part }}部</span>
      </p>

      <div class="calendar-inner">
        <table class="">
          <tr class="text-center">
            <th class="w-25">ID</th>
            <th class="w-25">名前</th>
            <th class="w-25">場所</th>
          </tr>

          @php
          $setting = $reservePersons->first();
          @endphp

          @if($setting && $setting->users->count())
          @foreach ($setting->users as $user)
          <tr class="text-center">
            <td class="w-25">{{ $user->id }}</td>
            <td class="w-25">{{ $user->name }}</td>
            <td class="w-25">{{ $user->place ?? '-' }}</td>
          </tr>

          @endforeach
          @else
          <tr class="text-center">
            <td colspan="3">予約者はいません</td>
          </tr>
          @endif

        </table>
      </div>
    </div>
  </div>

</x-sidebar>
