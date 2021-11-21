<?php
//$script_name = explode("/", $_SERVER["SCRIPT_NAME"]);
//unset($script_name[0]);
//unset($script_name[count($script_name)]);
//$script_name = implode("/", $script_name);
//
//define("BASE_URL",$script_name );
const BASE_URL = "";

$get_request = explode('?', $_SERVER["REQUEST_URI"]);
if (isset($get_request[1])) {
    $get_request = "?" . $get_request[1];
} else {
    $get_request = "";
}


function get_event(): string
{
    $get_query_param = explode('/', $_SERVER["REQUEST_URI"]);
    $query_param = "";
    if ($get_query_param[count($get_query_param) - 2] === "events") {
        $query_param = $get_query_param[count($get_query_param) - 1];
        $_SESSION['current_event'] = $query_param;
    }

    return $query_param;
}


function include_route_path(string $page, bool $auth = false,): void
{
    if ($auth) {
        if (isset($_SESSION['is_logged']) && $_SESSION['is_logged'] === true) {
            include __DIR__ . "/public/pages/" . $page . ".php";
        } else {
            header("Location:/login");
        }
    } else {
        include __DIR__ . "/public/pages/" . $page . ".php";
    }
}
function include_api_path(string $page, bool $auth = false,): void
{
    if ($auth) {
        if (isset($_SESSION['is_logged']) && $_SESSION['is_logged'] === true) {
            include __DIR__ . "/lib/ajax/" . $page . ".php";
        } else {
            header("Location:/login");
        }
    } else {
        include __DIR__ . "/lib/ajax/" . $page . ".php";
    }
}

match ($_SERVER["REQUEST_URI"]) {
    "/" => redirect('/home'),
    "/home" . @$get_request => include_route_path('home_page'),
    "/calendar" . @$get_request => include_route_path('calendar_page'),
    "/events" . @$get_request => include_route_path('events_page'),
    "/events/" . get_event() . @$get_request => include_route_path('eventDetails_page'),
    "/login" . @$get_request => include_route_path('login_page'),
    "/signup" . @$get_request => include_route_path('signup_page'),
    "/api/event" . @$get_request => include_api_path('getEvent'),
    default => include_route_path('404_page'),
};


