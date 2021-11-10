import { showPopup} from "./helpers.js";


const createEventModal = (e) => {
    let classDependsFromWidth = 'left';

    if (e.pageX <= 400) classDependsFromWidth = 'left';
    if (e.pageX >= window.innerWidth - 400) classDependsFromWidth = 'right';

    const element = document.createElement('div');
    element.classList.add('popup');
    element.classList.add(classDependsFromWidth);
    // element.classList.add(classDependsFromHeight);

    return element;
};

export const quickEventHandler = () => {
    const allQuickEvents = document.querySelectorAll('.quick-event')

    let events = [...allQuickEvents]

    const onDoubleClick = (e, currentEl) => {
        console.log('dddddd')
        const popup = createEventModal(e)
        currentEl.append(popup)
        showPopup(popup)
    }

    events.forEach((event) => {
        event.addEventListener('dblclick', function (e) {
            onDoubleClick(e, this)
        })
    })
}