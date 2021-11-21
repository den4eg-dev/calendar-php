// noinspection DuplicatedCode
import {showPopup} from "./helpers.js";
import {eventForm} from "./templates/eventForm.js";
import {getOneEvent} from "./api/getEvent.js";
import {isChecked} from "./createEvent.js";

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


const onDoubleClick = async (e, currentEl) => {
    if(e.target.closest('.popup')) return

    const popup = createEventModal(e)
    currentEl.append(popup)
    const eventPk = currentEl.getAttribute('id-data')
    showPopup(popup, true)

    const props = await getOneEvent(eventPk)
    popup.innerHTML = eventForm(props)


    const allDayChecked =  currentEl.querySelector('.do_allDayCheck')
    const timeBlock = currentEl.querySelector('.create-event__time')

    allDayChecked.addEventListener('change',(e)=>{
        if(e.target.checked) {
            timeBlock.classList.add('hide')
        }else timeBlock.classList.remove('hide')
    })

}



export const quickEventHandler = () => {
    const allQuickEvents = document.querySelectorAll('.quick-event')
    let events = [...allQuickEvents]

    events.forEach((event) => {
        event.addEventListener('dblclick', function (e) {
            onDoubleClick(e, this)
        })
    })


}