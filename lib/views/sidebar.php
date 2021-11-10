<?php
$current_date = $this->current_date;
$current_time = $this->current_time;
$time_plus_one_hour = $this->time_plus_one_hour;


?>
<div class="sidebar">
    <h1>sidebar</h1>
    <div class="badge-privat"><label><input type="checkbox"><span>Privat</span></label></div>
    <div class="badge-family"><label><input type="checkbox"><span>Family</span></label></div>
    <div class="badge-work"><label><input type="checkbox"><span>Work</span></label></div>

    <br>
    <br>
    <form method="post">
        <div><label>title<input type="text" name="title"></label></div>
        <div><label>date<input type="date" value="<?=@$current_date?>" name="date"></label></div>
        <div><label>start<input type="time" value="<?=@$current_time?>" name="start"></label></div>
        <div><label>end<input type="time" value="<?=@$time_plus_one_hour?>" name="end"></label></div>
        <div><label>description<textarea name="description"></textarea></label></div>
        <button type="submit" name="create">create</button>
    </form>
</div>