<?php
use website\Auth;
$layout = new Auth();

$layout->getHeader();
$layout->getContent("<h1>SIGNUP Page</h1>",true);
$layout->getFooter();