export const eventForm = (props) => {

    const {event_pk,event_title,event_date,time_start,time_end,description,type_color,type_fk} = props
    // console.log(props)
    const isChecked = false

    return `<form method="post" class="create-event">
    <div class="create-event__head d-flex">
        <div class="form-input">
            <input value=${event_title} name="title" class="create-event__title" placeholder="title" type="text" required>
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
            <input name="date" type="date" value=${event_date}>
        </label>
    </div>
    <div>

    </div>
    <div class="do_allDayCheck form-input">
        <label class="d-flex align-center space-between"> all day:
            <input name="allDay" type="checkbox" ${isChecked && 'checked'}>
        </label>
    </div>

    <div class="create-event__time ${isChecked && 'hide'}">
        <div class="form-input">
            <label class="d-flex align-center space-between">starts:
                <input name="start" type="time" value=${time_start} >
            </label>

        </div>
        <div class="form-input">
            <label class="d-flex align-center space-between">ends:
                <input name="end" type="time" value=${time_end}>
            </label>
        </div>
    </div>

    <div class="form-input">
        <textarea name="description" placeholder="description">${description}</textarea>
    </div>
<!--    <div>-->
<!--        <button name="create" type="submit" class="btn btn&#45;&#45;radius">Create</button>-->
<!--    </div>-->
</form>`
}