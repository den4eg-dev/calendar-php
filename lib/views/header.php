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

    <meta name="color-scheme" content="dark light">
    <!-- Safari   -->
    <meta name="theme-color" media="(prefers-color-scheme: Light)" content="#dcdcdc">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#1F1F1F">

   <!--flush effect    -->
    <script>
        // if (matchMedia('(prefers-color-scheme:dark)').media === 'not all') {
        //     document.documentElement.style.display = 'none';
        //     document.head.insertAdjacentHTML(
        //         'beforeend',
        //         "<Link rel='stylesheet'" +
        //         " href='styles/light.css' " +
        //         "onload='document.documentElement.style.display=\')'" >)
        // }
    </script>

    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/scheme/light.css" media="(prefers-color-scheme: light)">
    <link rel="stylesheet" href="/public/css/scheme/dark.css" media="(prefers-color-scheme: dark)">


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
            <div class="scheme-switcher">
                    <input class="scheme-switcher__radio" name="scheme-switcher" value="dark" type="radio">
                    <input class="scheme-switcher__radio" name="scheme-switcher" value="auto" checked type="radio">
                    <input class="scheme-switcher__radio" name="scheme-switcher" value="light" type="radio">
            </div>
        </nav>
    </div>


</header>
<main>
