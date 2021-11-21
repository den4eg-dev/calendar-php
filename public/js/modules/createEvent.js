import {showPopup} from "./helpers.js";


const onTypeClick = (target) => {
    const typePopup = target.querySelector('.popup')
    showPopup(typePopup)
}

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




        const typePopup = document.querySelector('.create-event__type')
        typePopup.addEventListener('click', function () {
            onTypeClick(this)
        })

    }

    target.addEventListener('click', onClick)

}
