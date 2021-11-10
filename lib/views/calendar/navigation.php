<?php
$today = $this->today;
$today_ym = $this->today_ym;
$ym = $this->ym;

$next_month = $this->nextDate();
$prev_month = $this->prevDate();

$title_month = $this->titleMonth;
$title_year = $this->titleYear;
?>


<div class="container-lg">
    <nav class="calendar-nav">
        <div class="calendar-nav__left">
            <h1><?= $title_month ?> <span><?= $title_year ?></span></h1>
        </div>
        <div class="calendar-nav__middle btn-group">
            <a href="?type=year" class="btn">Year</a>
            <a href="?type=month&ym=<?= $ym ?>" class="btn">Month</a>
            <a href="?type=week" class="btn">Week</a>
        </div>
        <div class="calendar-nav__right btn-group">
            <a href="?type=month&ym=<?=$prev_month?>" class="btn"> < </a>
            <a href="?type=month&ym=<?=$today_ym ?>" class="btn">today</a>
            <a href="?type=month&ym=<?=$next_month ?>" class="btn"> > </a>
        </div>
    </nav>
    <div class="d-inline relative mb-1">
        <button class="do_open btn btn--create">+</button>
        <div class="popup-create popup right">
            <?= $this->getContent('forms/create-event') ?>
        </div>
    </div>
</div>