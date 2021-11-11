<?php
use website\Auth;
$layout = new Auth();

$layout->getHeader();
$layout->getContent("forms/signup");
$layout->getFooter();