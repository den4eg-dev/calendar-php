<?php

if (isset($_GET['pk'])) {
    $event_pk = $_GET['pk'];

    $get_event = new \website\EventHandler($event_pk);

    $event_data = $get_event->selectOne();

    header('Content-Type: application/json');
    echo json_encode($event_data);
    exit;
}


//(isset($_POST['event']) && $_POST['event'] === "delete")
if (isset($_POST['event']) && $_POST['event'] === "delete") {

    $event_pk = $_POST['event_pk'];
    $event = new \website\EventHandler($event_pk);
    $event->delete();

    $res_status = [
      'status' => 200
    ];

    header('Content-Type: application/json');
    echo json_encode($res_status);
    exit;
}

if (isset($_POST['event']) && $_POST['event'] === "update") {

//    $get_query_param = explode('/', $_SERVER["REQUEST_URI"]);
//    $event_pk = $get_query_param[count($get_query_param) - 1];
//    $test = [];
//    $test[] = $_POST;

    $event_pk = $_POST['event_pk'];
    $updateEvent = new \website\EventHandler($event_pk);

    $data = [];

    if (isset($_POST['event_title'])) {
        $data = ['event_title' => $_POST['event_title']];
    } else if (isset($_POST['event_date'])) {
        $data = ['event_date' => $_POST['event_date']];
    } else if (isset($_POST['time_start'])) {
        $data = ['time_start' => $_POST['time_start']];
    } else if (isset($_POST['time_end'])) {
        $data = ['time_end' => $_POST['time_end']];
    } else if (isset($_POST['type_fk'])) {
        $data = ['type_fk' => $_POST['type_fk']];
    } else if (isset($_POST['description'])) {
        $data = ['description' => $_POST['description']];
    } else {
        $data = ['error' => 'not found'];
        echo json_encode($data);
        exit;
    };

    $updateEvent->update($data);

    $updated_event_data = $updateEvent->selectOne();
//    var_dump($event_data);
    header('Content-Type: application/json');
    echo json_encode($updated_event_data);
    exit;
}

