<?php

namespace website;

use mysql\Database;

class Calendar extends Layout
{
    public string $today;
    public string $today_ym;

    public string $ym;
    public string $timestamp;

    public string $week_days_count;
    public string $month_days_count;

    public string $day_count;
    public string $week_days;


    public string $titleMonth;
    public string $titleYear;

    public array $events;

    public function __construct()
    {

        $db = new Database();
        $sql = "SELECT * FROM events
                JOIN events__types
                ON events.type_fk = events__types.type_pk
                ORDER by created_at DESC";

        $this->events = $db->select($sql);

        $this->setCalendarType();
        date_default_timezone_set('Europe/Berlin');

        $this->timestamp = strtotime($this->ym . '-01');


        $this->today = date('Y-m-j');
        $this->today_ym = date('Y-m');

        $this->title = date('F, Y', $this->timestamp);
        $this->titleYear = date('Y', $this->timestamp);
        $this->titleMonth = date('F', $this->timestamp);

        $this->day_count = date('t', $this->timestamp);
        $this->week_days = date('N', $this->timestamp);


    }


//++++++++++++++++++++++++++++++++++++++++++++++++


    public function setCalendarType()
    {
        if (isset($_GET['ym'])) {
            $this->ym = $_GET['ym'];
        } else {
            $this->ym = date('Y-m');
        }
        if (!isset($_GET["type"])) {
            redirect("/calendar?type=month&ym=$this->ym");
        }
    }


    public function prevDate(): string
    {
        return date('Y-m', strtotime('-1 month', $this->timestamp));
    }

    public function nextDate(): string
    {
        return date('Y-m', strtotime('+1 month', $this->timestamp));
    }

    public function render_quick_events(string $current_date, string $class = ''): string
    {
        $output = "";
        foreach ($this->events as $event) {

            if ($current_date == $event["event_date"]) {

                $past = date('Y-m-j') > $event["event_date"] ? 'past' : '';

                $output .= "<div class='type--clr-" . $event['type_name'] . " quick-event $past' data-id='" . $event["event_pk"] . "'>
                             <span class='quick-event_title'>" . $event['event_title'] . "</span>
                             <span class='quick-event_time'>" . $event['time_start'] . "</span>
                        </div>";
            }
        }

        return $output;
    }


}