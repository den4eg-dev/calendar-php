<?php

use website\EventList;
$layout = new EventList();

$layout ->setTitle("Events");
$layout ->setJavaScripts(["events"]);

$layout->getHeader();

$layout->getContent('events/eventList');
$layout->getFooter();