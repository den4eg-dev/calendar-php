<?php

use website\Event;
use website\EventHandler;

if (isset($_POST['update'])) {
    $event_pk = $_POST['event_pk'];
    $data = [
        'event_title' => $_POST['event_title'],
        'event_date' => $_POST['event_date'],
        'time_start' => $_POST['time_start'],
        'time_end' => $_POST['time_end'],
        'description' => $_POST['description'],
    ];

    $event = new EventHandler($event_pk);
    $event->update($data);

    unset($_POST['update']);
}


$param = explode('/', $_SERVER["REQUEST_URI"]);
$param = $param[count($param) - 1];

//$data = [
//    'template' => 'events/event',
//    'scripts' => ['events'],
//];
//
//$event = new Event($data, $param);
