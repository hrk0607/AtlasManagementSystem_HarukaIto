<x-sidebar>
  <div class="calendar-wrapper">
    <div class="calendar-inner">
      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div class="calendar-box">
        {!! $calendar->render() !!}

        <!-- キャンセル確認モーダル -->
        <div class="modal fade" id="cancelModal" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-body" style="margin:1rem;">
                <p>予約日：<span id="modalDate"></span></p>
                <p>予約時間：<span id="modalPart"></span></p>
                <p>上記の予約をキャンセルしてもよろしいですか？</p>

                <div class="modal-button" style="display: flex;justify-content: space-between;">
                  <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close" style="padding:0 1.5rem;">閉じる</button>
                  <form action="/delete/calendar" method="post">
                    @csrf
                    <input type="hidden" name="delete_reserve_id" id="modalReserveId">
                    <button type="submit" class="btn btn-danger">キャンセル</button>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="text-right w-75 m-auto">
        <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts" style="margin-top:1rem;">
      </div>
    </div>
  </div>
</x-sidebar>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="{{ asset('js/calendar.js') }}"></script>
