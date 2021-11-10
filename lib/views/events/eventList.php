<?php

$events = '';
$event_list = $this->events;
$prevDate = '';
foreach ($event_list as $event) {
    if ($prevDate !== $event['event_date']) {
        $events .= "
    <div class='event'>
                <div class='event__date'>
                    <h3>" . $event['event_date'] . "</h3>
                    <div class='event__line' style='background-color: blau'></div>
                </div>
                <div class='event__content'>
                    <div class='d-flex space-between'>
                        <div class='event__title'>
                            <span style='background-color: " . $event['type_color'] . "'></span>
                            <div>
                                <h4>" . $event['event_title'] . "</h4>
                                <p>" . $event['description'] . "</p>
                            </div>
                        </div>
                        <div class='event__time'>
                            <span>" . $event['time_start'] . "</span>
                            <span>" . $event['time_end'] . "</span>
                        </div>
                    </div>
                    <div class='event__modified'>
                        <small>last modified: " . $event['updated_at'] . "</small>
                    </div>

                </div>
            </div>
    ";
    } else {
        $events .= "
    <div class='event'>
             
                <div class='event__content'>
                    <div class='d-flex space-between'>
                        <div class='event__title'>
                            <span style='background-color: " . $event['type_color'] . "'></span>
                            <div>
                                <h4>" . $event['event_title'] . "</h4>
                                <p>" . $event['description'] . "</p>
                            </div>
                        </div>
                        <div class='event__time'>
                            <span>" . $event['time_start'] . "</span>
                            <span>" . $event['time_end'] . "</span>
                        </div>
                    </div>
                    <div class='event__modified'>
                        <small>last modified: " . $event['updated_at'] . "</small>
                    </div>

                </div>
            </div>
    ";
    }


    $prevDate = $event['event_date'];
}
?>


<div class="container-lg">

    <div class="d-flex">
        <aside class="sidebar">
            <div class="d-flex flex-end relative">
                <button class="do_open btn btn--create">+</button>
                <div class="popup-create popup left">

                </div>
            </div>

            <div class="sidebar__list">
                <ul>
                    <li>
                        <div class="event-type">
                            <label>
                                <input type="checkbox" class="event-type__checkbox" checked>
                                <span class="event-type__checkmark"></span>
                            </label>
                            <input class="event-type__title" type="text" value="title type" readonly>
                        </div>
                    </li>
                    <li>
                        <div class="event-type">
                            <label>
                                <input type="checkbox" class="event-type__checkbox" checked>
                                <span class="event-type__checkmark"></span>
                            </label>
                            <input class="event-type__title" type="text" value="title type" readonly>
                        </div>
                    </li>
                    <li>
                        <div class="event-type">
                            <label>
                                <input type="checkbox" class="event-type__checkbox" checked>
                                <span class="event-type__checkmark"></span>
                            </label>
                            <input class="event-type__title" type="text" value="title type" readonly>

                        </div>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="events-list">
            <div class="mb-1">
                <form class="w-100">
                    <div class="form-input">
                        <input placeholder="search events by title, description or ...." type="search">
                    </div>
                    <input class="d-none" type="submit">
                </form>
            </div>
            <?= $events ?>
        </div>
    </div>

</div>