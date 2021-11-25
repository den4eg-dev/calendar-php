import {showPopup} from "./helpers.js";


const onTypeClick = (target) => {
    const typePopup = target.querySelector('.popup')
    showPopup(typePopup)
}

export const eventTypesHandler = (element) => {
    const typePopup = element.querySelector('.create-event__type')
    typePopup.addEventListener('click', function (e) {
        e.preventDefault()
        onTypeClick(this)
    })
}