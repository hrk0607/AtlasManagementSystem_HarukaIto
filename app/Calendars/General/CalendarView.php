<?php

namespace App\Calendars\General;

use Carbon\Carbon;
use Auth;

class CalendarView
{

  private $carbon;
  function __construct($date)
  {
    $this->carbon = new Carbon($date, 'Asia/Tokyo');
  }

  public function getTitle()
  {
    return $this->carbon->format('Y年n月');
  }

  function render()
  {
    $html = [];
    $html[] = '<div class="calendar text-center">';
    $html[] = '<table class="table">';
    $html[] = '<thead>';
    $html[] = '<tr>';
    $html[] = '<th>月</th>';
    $html[] = '<th>火</th>';
    $html[] = '<th>水</th>';
    $html[] = '<th>木</th>';
    $html[] = '<th>金</th>';
    $html[] = '<th class="day-sat">土</th>';
    $html[] = '<th class="day-sun">日</th>';
    $html[] = '</tr>';
    $html[] = '</thead>';
    $html[] = '<tbody>';
    $weeks = $this->getWeeks();
    foreach ($weeks as $week) {
      $html[] = '<tr class="' . $week->getClassName() . '">';

      $days = $week->getDays();
      foreach ($days as $day) {
        if (!$day->everyDay()) {
          $html[] = '<td class="calendar-td day-blank"></td>';
          continue;
        }

        $target = $day->everyDay();
        $weekday = Carbon::parse($target, 'Asia/Tokyo')->dayOfWeek; // 0=日, 6=土
        $today = Carbon::today('Asia/Tokyo')->format("Y-m-d");
        $startDay = $this->carbon->copy()->format("Y-m-01");

        // 土日用クラス付与
        $weekClass = '';
        if ($weekday == 6) {
          $weekClass = 'day-sat';  // 土曜
        } elseif ($weekday == 0) {
          $weekClass = 'day-sun';    // 日曜
        }


        // 今日より前かどうか
        $isPast = ($startDay <= $target) && ($target <= $today);

        if ($isPast) {
          $html[] = '<td class="calendar-td past-day ' . $weekClass . '">';
        } else {
          $html[] = '<td class="calendar-td ' . $weekClass . ' ' . $day->getClassName() . '">';
        }

        $html[] = $day->render();

        // 予約がある場合
        if (in_array($day->everyDay(), $day->authReserveDay())) {

          // 部の取得
          $reservePart = $day->authReserveDate($day->everyDay())->first()->setting_part;

          // 部のテキスト整形
          if ($reservePart == 1) {
            $reservePart = "リモ1部";
          } else if ($reservePart == 2) {
            $reservePart = "リモ2部";
          } else if ($reservePart == 3) {
            $reservePart = "リモ3部";
          }

          // 過去日 → ボタンではなくテキスト表示
          if ($isPast) {
            $html[] = '<p class="m-auto p-0 w-75" style="font-size:12px; color:#666;">' . $reservePart . '</p>';
          } else {
            // 未来日：削除ボタン
            $html[] = '<button type="button" class="btn btn-danger p-0 w-75 open-cancel-modal" style="font-size:12px" data-date="' . $day->everyDay() . '" data-part="' . $reservePart . '" data-reserve-id="' . $day->authReserveDate($day->everyDay())->first()->id . '">' . $reservePart . '</button>';
          }

          $html[] = '<input type="hidden" name="getPart[]" value="" form="reserveParts">';
        } else {

          // 過去日・予約なし → 「受付終了」
          if ($isPast) {
            $html[] = '<p class="m-auto p-0 w-75" style="font-size:12px; color:#666;">受付終了</p>';
            $html[] = '<input type="hidden" name="getPart[]" value="" form="reserveParts">';
          } else {
            // 未来日は通常の選択フォーム
            $html[] = $day->selectPart($day->everyDay());
          }
        }
        $html[] = $day->getDate();
        $html[] = '</td>';
      }
      $html[] = '</tr>';
    }
    $html[] = '</tbody>';
    $html[] = '</table>';
    $html[] = '</div>';
    $html[] = '<form action="/reserve/calendar" method="post" id="reserveParts">' . csrf_field() . '</form>';
    $html[] = '<form action="/delete/calendar" method="post" id="deleteParts">' . csrf_field() . '</form>';

    return implode('', $html);
  }

  protected function getWeeks()
  {
    $weeks = [];
    $firstDay = $this->carbon->copy()->firstOfMonth();
    $lastDay = $this->carbon->copy()->lastOfMonth();
    $week = new CalendarWeek($firstDay->copy());
    $weeks[] = $week;
    $tmpDay = $firstDay->copy()->addDay(7)->startOfWeek();
    while ($tmpDay->lte($lastDay)) {
      $week = new CalendarWeek($tmpDay, count($weeks));
      $weeks[] = $week;
      $tmpDay->addDay(7);
    }
    return $weeks;
  }
}
