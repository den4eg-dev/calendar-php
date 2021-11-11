<?php

use website\Home;

$layout = new Home();

$layout->setTitle("Welcome");
$layout->getHeader();
$layout->getContent('<div class="container-lg"><h1>HOME PAGE</h1></div>', true);




$layout->getFooter();