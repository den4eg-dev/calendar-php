import {showPopup} from "./helpers.js";
import {eventTypesHandler} from "./eventTypesHandler.js";




export const isChecked = (e) => {
    // console.dir(e.target.checked)
    const timeBlock = document.querySelector('.create-event__time')
    if(e.target.checked) {
        timeBlock.classList.add('hide')
    }else timeBlock.classList.remove('hide')
}

export const createEvent = (target) => {

    const onClick = (e) => {
        const popup = e.target.parentNode.querySelector('.popup')
        showPopup(popup)

        const titleInput = document.querySelector('.create-event__title')
        titleInput.focus()

        const allDayChecked = document.querySelector('.do_allDayCheck')
        allDayChecked.addEventListener('change',isChecked)

        eventTypesHandler(popup)
    }

    target.addEventListener('click', onClick)

}
