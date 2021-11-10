<?php

$layout = new \website\Layout();

$layout->getHeader();
$layout->getContent('<h1>404 - NOT FOUND</h1>',true);
$layout->getFooter();


