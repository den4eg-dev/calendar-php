import {getTypes} from "../api/getTypes.js";
import {createBtn, deleteBtn} from "./buttons.js";

const fetchTypes = async () => {
    return await getTypes()
}

export const eventForm = async (props, create = false) => {


    const types = await fetchTypes()

    let typesOutput = ``

    types.forEach(type => {
        /**
         * @param type          object of types.
         * @param data.type_pk   primary key.
         * @param data.type_name   name of type work/family/private.
         */
        typesOutput += `<div data-id="${type.type_pk}" class="item ${type.type_name}">${type.type_name}</div> \n`
    })

    const {event_title, event_date, time_start, time_end, description,type_name,type_fk} = props
    const isChecked = false

    return `<form method="post" class="create-event">
    <div class="create-event__head d-flex">
        <div class="form-input">
            <input value=${event_title} name="title" class="create-event__title" placeholder="title" type="text" required>
        </div>
        <!--                            TYPES BOX-->
        <button class="create-event__type">
            <span data-id='${type_fk}' class='current-item type--clr-${type_name}'></span>
            <div class='popup typePopup right'>
                ${typesOutput}
            </div>
        </button>
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
        ${create ? createBtn() : deleteBtn()}
</form>`
}