<?php

use website\Calendar;
use website\EventHandler;

if(isset($_POST['create'])) {
    $data = [
        'event_title' => $_POST['title'],
        'type_fk' => 3,
        'user_fk' => 61,
        'event_date' => $_POST['date'],
        'time_start' => $_POST['start'],
        'time_end' => $_POST['end'],
        'description' => $_POST['description'],
    ];

    $event= new EventHandler();
    $event->create($data);

    redirect($_SERVER['REDIRECT_URL']);
}


$layout = new Calendar();

$layout->setTitle("Calendar");
$layout->setJavaScripts(["calendar"]);




$layout->getHeader();

$layout->getContent('calendar/navigation');

match ($_GET['type']) {

    "month" => $layout->getContent('calendar/month'),
    "year" => $layout->getContent('calendar/year'),
    "week" => $layout->getContent('calendar/week'),
};


$layout->getFooter();
