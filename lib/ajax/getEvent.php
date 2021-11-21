<?php

if (!isset($_GET['pk'])) {
    die("<h4>Sorry! Event not found!</h4>");
}

$event_pk = $_GET['pk'];

$get_event = new \website\EventHandler($event_pk);

$event_data = $get_event->selectOne();

header('Content-Type: application/json');
echo json_encode($event_data);

