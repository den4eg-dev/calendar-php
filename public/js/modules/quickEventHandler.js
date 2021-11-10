// noinspection DuplicatedCode
import {showPopup} from "./helpers.js";


const createEventModal = (e) => {
    let classDependsFromWimdowWidth = 'right';

    // if (e.pageX <= 400) classDependsFromWidth = 'left';
    console.log(e.pageX)
    // if (e.pageX >= window.innerWidth - 400) classDependsFromWidth = 'right';

    const element = document.createElement('div');
    element.classList.add('popup');

    element.classList.add(classDependsFromWimdowWidth);
    // element.classList.add(classDependsFromHeight);
    return element;
};

export const quickEventHandler = () => {
    const allQuickEvents = document.querySelectorAll('.quick-event')

    let events = [...allQuickEvents]

    const onDoubleClick = (e, currentEl) => {
        const popup = createEventModal(e)
        currentEl.append(popup)
        showPopup(popup,true)
    }

    events.forEach((event) => {
        event.addEventListener('dblclick', function (e) {
            onDoubleClick(e, this)
        })
    })
}