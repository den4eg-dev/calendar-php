<?php

$nav_links = $this->getLinks();
$auth_links = [
    'sign in' => "login",
    'sign up' => "signup"
];
$page_title = $this->getTitle();

$nav_links_output = "";
$auth_links_output = "";

foreach ($nav_links as $nav_link => $path) {
    $active = str_contains($_SERVER["REQUEST_URI"], "/" . $path) ? "active" : "";
    $nav_links_output .= "<li class='$active'><a href='/$path'>$nav_link</a></li>\n";
}
foreach ($auth_links as $auth_link => $path) {
    $active = str_contains($_SERVER["REQUEST_URI"], "/" . $path) ? "active" : "";
    $auth_links_output .= "<li class='$active'><a href='/$path'>$auth_link</a></li>\n";
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/css/scheme/light.css" media="(prefers-color-scheme: light)">
    <link rel="stylesheet" href="/public/css/scheme/dark.css" media="(prefers-color-scheme: dark)">
    <link rel="stylesheet" href="/public/css/main.css">
    <title><?= $page_title ?></title>
</head>
<body>
<header class="header">
    <div class="container">
        <nav class="navbar">
            <div class="navbar__left">
                <div class="navbar__logo">
                    <span>Logo</span>
                </div>
            </div>
            <div class="navbar__middle">
                <ul>
                    <?= $nav_links_output ?>
                </ul>
            </div>
            <div class="navbar__right">
                <ul>
                    <?= $auth_links_output ?>
                </ul>
            </div>
            <div class="theme-switcher">
                <label>dark
                    <input name="theme-switcher" value="dark" type="radio">
                </label>
                <label>auto
                    <input name="theme-switcher" value="auto" type="radio">
                </label>
                <label>light
                    <input name="theme-switcher" value="light" type="radio">
                </label>
            </div>
        </nav>
    </div>


</header>
<main>
