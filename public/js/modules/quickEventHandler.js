import {showPopup} from "./helpers.js";
import {eventForm} from "./templates/eventForm.js";
import {getOneEvent} from "./api/getOneEvent.js";
import {eventTypesHandler} from "./eventTypesHandler.js";
import {updateEvent} from "./api/updateEvent.js";

const createEventModal = (e) => {
    let classDependsFromWindowWidth = 'right';

    if (e.pageX > window.innerWidth - 400) classDependsFromWindowWidth = 'left';
    // if (e.pageX >= window.innerWidth - 400) classDependsFromWidth = 'right';

    const element = document.createElement('div');
    element.classList.add('popup');

    element.classList.add(classDependsFromWindowWidth);
    // element.classList.add(classDependsFromHeight);
    return element;
};
const addInputListener = (form, nameInput = "", listener = "blur") => {
    const element = form.querySelector(`input[name=${nameInput}]`)

    element.addEventListener(listener, (e) => updateInputData(e, nameInput))
}
const updateInputData = (e, nameInput) => {

    const input = e.target
    const pk = 87

    const formData = new FormData();
    formData.append('event', 'update')
    formData.append('event_pk', `${pk}`)
    formData.append('event_title', `${input.value}`)

    // switch (nameInput) {
    //     case 'date':
    //         formData.append('event_date', `${input.value}`);
    //         break;
    //     case 'start':
    //         formData.append('event_start', `${input.value}`);
    //         break;
    //     case 'end':
    //         formData.append('event_end', `${input.value}`);
    //         break;
    //     case 'allDay':
    //         //TODO check name of input
    //         formData.append('event_allDay', `${input.value}`);
    //         break;
    //     case 'title':
    //         formData.append('event_title', `${input.value}`);
    //         break;
    //     default:
    //         break;
    // }

    updateEvent(formData).then(res=> {

        console.log(res)
        const id = `[data-id =${res.event_pk}]`
        const quickEventEl = document.querySelector('.quick-event[data-id="87"]')

        console.log(quickEventEl)


        // type--clr-private quick-event past
    })


}

const onDoubleClick = async (e, currentEl) => {
    if (e.target.closest('.popup')) return

    const popup = createEventModal(e)

    currentEl.append(popup)
    const eventPk = currentEl.getAttribute('data-id')
    showPopup(popup, true)

    const props = await getOneEvent(eventPk)

    popup.innerHTML = await eventForm(props)

    const form = popup.querySelector('.create-event')

    eventTypesHandler(popup)
    const allDayChecked = currentEl.querySelector('.do_allDayCheck')

    const timeBlock = currentEl.querySelector('.create-event__time')

    allDayChecked.addEventListener('change', (e) => {
        if (e.target.checked) {
            timeBlock.classList.add('hide')
        } else timeBlock.classList.remove('hide')
    })


    addInputListener(form, 'title', 'blur')


}


export const quickEventHandler = () => {
    const allQuickEvents = document.querySelectorAll('.quick-event')
    let events = [...allQuickEvents]

    events.forEach((event) => {
        event.addEventListener('dblclick', async function (e) {
            await onDoubleClick(e, this)
        })
    })


}