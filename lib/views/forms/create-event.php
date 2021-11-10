<?php
$current_date = $this->today;
$current_time = date('H:i');
$timestamp = strtotime($current_time) + 60 * 60;
$time_plus_one_hour = date('H:i', $timestamp);
?>
<form method="post" class="create-event">
    <div class="create-event__head d-flex">
        <div class="form-input">
            <input name="title" class="create-event__title" placeholder="title" type="text" required>
        </div>
        <!--                            TYPES BOX-->
        <div class="create-event__type">
            <span data-id='${type_fk}' class='current-item ${type_color}'></span>

            <div class='popup right'>
                <!--                                    <div class="bg"></div>-->
                <div class="item">work</div>
                <div class="item">family</div>
                <div class="item">privat</div>

            </div>

        </div>
    </div>

    <div class="form-input">
        <label class="d-flex align-center space-between"> date:
            <input name="date" type="date" value="<?=$current_date?>">
        </label>
    </div>
    <div>

    </div>
    <div class="do_allDayCheck form-input">
        <label class="d-flex align-center space-between"> all day:
            <input name="allDay" type="checkbox">
        </label>
    </div>

    <div class="create-event__time">
        <div class="form-input">
            <label class="d-flex align-center space-between">starts:
                <input name="start" type="time" value="<?=$current_time?>">
            </label>

        </div>
        <div class="form-input">
            <label class="d-flex align-center space-between">ends:
                <input name="end" type="time" value="<?=$time_plus_one_hour?>">
            </label>
        </div>
    </div>

    <div class="form-input">
        <textarea name="description" placeholder="description"></textarea>
    </div>
    <div>
        <button name="create" type="submit" class="btn btn--radius">Create</button>
    </div>


</form>