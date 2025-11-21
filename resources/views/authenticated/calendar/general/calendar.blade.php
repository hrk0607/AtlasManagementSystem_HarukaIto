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

              <div class="modal-header">
                <h5 class="modal-title">予約キャンセル確認</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <p>予約日：<span id="modalDate"></span></p>
                <p>予約時間：<span id="modalPart"></span></p>
              </div>

              <div class="modal-footer">
                <form action="/delete/calendar" method="post">
                  @csrf
                  <input type="hidden" name="delete_reserve_id" id="modalReserveId">
                  <button type="submit" class="btn btn-danger">キャンセルする</button>
                </form>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/calendar.js') }}"></script>
