<?php

use website\Home;

$layout = new Home();

$layout->setTitle("Welcome");
$layout->getHeader();
$layout->getContent('<h1>HOME PAGE</h1>', true);




$layout->getFooter();