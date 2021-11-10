import {showPopup} from "./helpers.js";


const onTypeClick = (target) => {
    const typePopup = target.querySelector('.popup')
    showPopup(typePopup)
}

export const createEvent = (target) => {

    const onClick = (e) => {
        const popup = e.target.parentNode.querySelector('.popup')
        showPopup(popup)

        const titleInput = document.querySelector('.create-event__title')
        titleInput.focus()

        const typePopup = document.querySelector('.create-event__type')
        typePopup.addEventListener('click', function () {
            onTypeClick(this)
        })

    }

    target.addEventListener('click', onClick)

}
