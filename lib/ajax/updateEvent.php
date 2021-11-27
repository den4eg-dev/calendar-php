<?php

$get_query_param = explode('/', $_SERVER["REQUEST_URI"]);
$event_pk = $get_query_param[count($get_query_param) - 1];
$data2 = [
    'pk'=> $event_pk,
    'url'=> $_SERVER["REQUEST_URI"]
];
$updateEvent = new \website\EventHandler($event_pk);

if (isset($_REQUEST['event_title'])) {
   $data = $updateEvent->update($_REQUEST['event_title']);
} else if (isset($_REQUEST['event_date'])) {
    $data =  $updateEvent->update($_REQUEST['event_date']);
} else if (isset($_REQUEST['event_start'])) {
    $data =  $updateEvent->update($_REQUEST['event_start']);
} else if (isset($_REQUEST['event_end'])) {
    $data =  $updateEvent->update($_REQUEST['event_end']);
} else if (isset($_REQUEST['type_fk'])) {
    $data =  $updateEvent->update($_REQUEST['type_fk']);
} else $data = ['error'=> 'not found'];

//$data = [
//  'event'=> $_POST['event_title']
//];
//$data = [
//    'event'=> 'sadas',
//    'event1'=> 'sadas',
//    'event2'=> 'sadas',
//];
$result = [$data2,$data];
header('Content-Type: application/json');
echo json_encode($data);