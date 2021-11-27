<?php
if (isset($_GET['pk'])) {
    $event_pk = $_GET['pk'];

    $get_event = new \website\EventHandler($event_pk);

    $event_data = $get_event->selectOne();

    header('Content-Type: application/json');
    echo json_encode($event_data);
    exit;
}

if (isset($_POST['event']) && $_POST['event'] === "update") {

//    $get_query_param = explode('/', $_SERVER["REQUEST_URI"]);
//    $event_pk = $get_query_param[count($get_query_param) - 1];
//    $test = [];
//    $test[] = $_POST;

    $event_pk = $_POST['event_pk'];

    $event_data = [
        'event_title' => $_REQUEST['event_title']
    ];
    $updateEvent = new \website\EventHandler($event_pk);
    $updateEvent->update($event_data);
    $event_data = $updateEvent->selectOne();
//    if (isset($_REQUEST['event_title'])) {
//        $data = $updateEvent->update($_REQUEST['event_title']);
//    } else if (isset($_REQUEST['event_date'])) {
//        $data =  $updateEvent->update($_REQUEST['event_date']);
//    } else if (isset($_REQUEST['event_start'])) {
//        $data =  $updateEvent->update($_REQUEST['event_start']);
//    } else if (isset($_REQUEST['event_end'])) {
//        $data =  $updateEvent->update($_REQUEST['event_end']);
//    } else if (isset($_REQUEST['type_fk'])) {
//        $data =  $updateEvent->update($_REQUEST['type_fk']);
//    } else $data = ['error'=> 'not found'];

//    var_dump($event_data);
    header('Content-Type: application/json');
    echo json_encode($event_data);
    exit;
}

