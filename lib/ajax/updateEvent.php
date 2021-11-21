<?php


$sql_query = "";

if (isset($_REQUEST['event_title'])) {
    $sql_query = "event_title = '" . $_REQUEST['event_title'] . "'";
} else if (isset($_REQUEST['event_date'])) {
    $sql_query = "event_date = '" . $_REQUEST['event_date'] . "'";
} else if (isset($_REQUEST['event_start'])) {
    $sql_query = "time_start = '" . $_REQUEST['event_start'] . "'";
} else if (isset($_REQUEST['event_end'])) {
    $sql_query = "time_end = '" . $_REQUEST['event_end'] . "'";
} else exit;

$event_pk = $_REQUEST['event_pk'];

$HOST = 'localhost';
$LOGIN = 'root';
$PASSWORD = 'root';
$DB_NAME = 'calender';

$db_calender = mysqli_connect($HOST, $LOGIN, $PASSWORD, $DB_NAME);
mysqli_query($db_calender, "SET names utf8");


mysqli_query($db_calender, "UPDATE events 
SET $sql_query
WHERE event_pk = '$event_pk'");



mysqli_close($db_calender);
