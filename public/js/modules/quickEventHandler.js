import {showPopup} from "./helpers.js";
import {eventForm} from "./templates/eventForm.js";
import {getOneEvent,deleteOneEvent} from "./api/getOneEvent.js";
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
const deleteEvent = (formData) => {
    deleteOneEvent(formData).then(res=> {
        if (res.status === 200) location.reload()
        else throw("error")
    })
}
const addInputListener = (form, nameInput, listener, currentEventProps) => {
    const element = form.querySelector(`[name=${nameInput}]`)
    element.addEventListener(listener, (e) => handlerInputData(e, nameInput, currentEventProps))
}

const handlerInputData = (e, nameInput, currentEventProps) => {
    e.preventDefault()
    const {event_pk: current_event_pk} = currentEventProps;
    let pageReload = false
    const input = e.target

    const formData = new FormData();
    formData.append('event_pk', `${current_event_pk}`)

    switch (nameInput) {
        case 'date':
            formData.append('event_date', `${input.value}`);
            pageReload = true
            break;
        case 'start':
            formData.append('time_start', `${input.value}`);
            break;
        case 'end':
            formData.append('time_end', `${input.value}`);
            break;
        case 'allDay':
            formData.append('allDay', `${input.value}`);
            break;
        case 'description':
            formData.append('description', `${input.value}`);
            break;
        case 'title':
            formData.append('event_title', `${input.value}`);
            break;
        case 'delete':
            formData.append('event', 'delete')
            console.log('START')
            return deleteEvent(formData)
        default:
            break;
    }
    console.log('END')
    formData.append('event', 'update')
    updateEvent(formData).then(res => {

        const {event_pk, event_title, time_start} = res;
        const id = `[data-id="${event_pk}"]`

        const quickEventEl = document.querySelector(id)
        const quickEventElTitle = quickEventEl.querySelector('.quick-event_title')
        const quickEventTime = quickEventEl.querySelector('.quick-event_time')

        quickEventElTitle.innerHTML = event_title
        quickEventTime.innerHTML = time_start

        const className = quickEventEl.className
        // console.log(className.includes('type--clr'))

        // type--clr-private quick-event past
        // pageReload && location.reload()
        pageReload
        && confirm('This page will be reload. Are you sure?')
            ? location.reload()
            : null
    })


}

const onDoubleClick = async (e, currentEl) => {
    if (e.target.closest('.popup')) return

    const popup = createEventModal(e)

    currentEl.append(popup)
    const eventPk = currentEl.getAttribute('data-id')
    showPopup(popup, true, false)

    const props = await getOneEvent(eventPk)

    popup.innerHTML = await eventForm(props)

    const form = popup.querySelector('.create-event')

    eventTypesHandler(popup, eventPk)
    const allDayChecked = currentEl.querySelector('.do_allDayCheck')

    const timeBlock = currentEl.querySelector('.create-event__time')

    allDayChecked.addEventListener('change', (e) => {
        if (e.target.checked) {
            timeBlock.classList.add('hide')
        } else timeBlock.classList.remove('hide')
    })


    addInputListener(form, 'title', 'input', props)
    addInputListener(form, 'description', 'input', props)
    addInputListener(form, 'date', 'change', props)
    addInputListener(form, 'start', 'change', props)
    addInputListener(form, 'end', 'change', props)
    addInputListener(form, 'allDay', 'change', props)
    addInputListener(form, 'delete', 'click', props)


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