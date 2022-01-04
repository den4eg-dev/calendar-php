<?php

$ym = $this->ym;

$timestamp = $this->timestamp;
$today = $this->today;
//$today = date('Y-m-d');

$titleMonth = $this->titleMonth;
$day_count = $this->day_count;
$week_days = $this->week_days;


// week number
// $ddate = new DateTime(date('Y-m-j'));
// $wweek = $ddate->format("W");
// print_p($wweek);

// Render variables/arrays for calendar
$weeks = [];
$week = '';


//last month days
$day_count_last_month = date('t', strtotime('-1 month', $timestamp));
$last_month = date('Y-m', strtotime('-1 month', $timestamp));


for ($i = 1; $i <= ($week_days - 1); $i++) {
    $last_month_day = ($day_count_last_month - ($week_days - 1)) + $i;

    $last_month_date = $last_month . '-' . sprintf("%02d", $last_month_day);
    $lass_month_event = $this->render_quick_events($last_month_date);

    $week .= "<div class='day-content weekend'>
                            <span class='day-number'>
                                 <span class='badge badge--prev'>$last_month_day</span>
                             </span>
                             <div class='month-week__events'>" . @$lass_month_event . "</div>
                        </div>";
}


for ($day = 1; $day <= $day_count; $day++, $week_days++) {
//    print_p($day ."====" .$week_days."===" . $day_count);
//    $current_date = $ym . '-' . $day;
    $current_date = $ym . '-' . sprintf("%02d", $day);
//    print_p($current_date. '====' .$today);
    $date = $ym . '-' . sprintf("%02d", $day);

    $current_month_day = $day == 1 ? $day . ". " . substr($titleMonth, 0, 3) : $day;
    $events = $this->render_quick_events($date);

    $active_class = $today === $current_date ? "active" : "";
    $week .= "<div class='day-content'>
                 <span class='day-number'>
                     <span class='badge $active_class'>$current_month_day</span>
                 </span>
                 <div class='month-week__events'>" . @$events . "</div>
               </div>";


    // Sunday OR last day of the month
    if ($week_days % 7 == 0 || $day == $day_count) {

        // last day of the month
        if ($day == $day_count && $week_days % 7 != 0) {

            for ($j = 1; $j <= (7 - $week_days % 7); $j++) {
                $next_month = date('Y-m', strtotime('+1 month', $timestamp));
                $next_month_name = substr(date('F', strtotime('+1 month', $timestamp)), 0, 3);
                $next_month_day = $j == 1 ? $j . ". " . $next_month_name : $j;
                $next_month_date = $next_month . '-' . sprintf("%02d", $next_month_day);
                $next_month_events = $this->render_quick_events($next_month_date);


                $week .= "<div class='day-content weekend'>
                            <span class='day-number'>
                                 <span class='badge badge--next'>$next_month_day</span>
                             </span>
                             <div class='month-week__events'>" . @$next_month_events . "</div>
                        </div>";
            }
        }

        $weeks[] .= "<div class='month_week'>$week</div>";
        $week = '';
    }
}

$name_days_arr = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
$name_days_output = "";

foreach ($name_days_arr as $day_name) {
    $name_days_output .= "<div><span class='month_day-name'>$day_name</span></div>";
}

$output_month_weeks = implode('', $weeks);

?>

<div class="container-lg">
    <div class="month">
        <div class="month_day-names">
            <?= $name_days_output ?>
        </div>
        <?= $output_month_weeks ?>
    </div>
</div>
