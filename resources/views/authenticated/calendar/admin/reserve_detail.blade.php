<x-sidebar>
  <div class="w-75 m-auto h-75">
    <div class="reserve-wrapper">
      <p>
        <span>{{ \Carbon\Carbon::parse($date)->format('Y年n月j日') }}</span>
        <span class="ml-3">{{ $part }}部</span>
      </p>

      <div class="reserve-inner">
        <table class="reserve-table">
          <tr class="table-header">
            <th class="w-1/5">ID</th>
            <th class="[width:40%]">名前</th>
            <th class="[width:40%]">場所</th>
          </tr>

          @php
          $setting = $reservePersons->first();
          @endphp

          @if($setting && $setting->users->count())
          @foreach ($setting->users as $user)
          <tr class="table-row">
            <td class="w-1/5">{{ $user->id }}</td>
            <td class="[width:40%]">{{ $user->over_name }} {{ $user->under_name }}</td>
            <td class="[width:40%]">リモート</td>
          </tr>

          @endforeach
          @else
          <tr class="table-row">
            <td colspan="3">予約者はいません</td>
          </tr>
          @endif

        </table>
      </div>
    </div>
  </div>

</x-sidebar>
