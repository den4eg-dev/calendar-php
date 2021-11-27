<?php

$get_types = new \website\EventHandler();

$types_data = $get_types->selectTypes();

header('Content-Type: application/json');
echo json_encode($types_data);


