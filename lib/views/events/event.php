<?php

use website\EventHandler;

$event_title = $this->event_title;
$event_date = $this->event_date;
$time_start = $this->time_start;
$time_end = $this->time_end;
$description = $this->description;

$event_pk = $this->event_pk;
?>
<div class="container">
    <h1>EVENT DETAILS</h1>
    <form method="post">
        <div><label>title<input type="text" name="event_title" value="<?=$event_title?>"></label></div>
        <div><label>date<input type="date" value="<?=@$event_date?>" name="event_date"></label></div>
        <div><label>start<input type="time" value="<?=@$time_start?>" name="time_start"></label></div>
        <div><label>end<input type="time" value="<?=@$time_end?>" name="time_end"></label></div>
        <div><label>description<textarea name="description"><?=@$description?></textarea></label></div>

        <input type="hidden" name="event_pk" value="<?=$event_pk?>">

        <button class='btn' name='update'>update</button>

    </form>
</div>
