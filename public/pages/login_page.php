<?php

use website\Auth;
$layout = new Auth();

$layout->getHeader();
$layout->getContent("<h1>Login Page</h1>",true);
$layout->getFooter();