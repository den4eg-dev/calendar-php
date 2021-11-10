export const outSideClick = (element, className = "show") => {

    const onClickAndRemove = (e) => {

        const path = e.path || (e.composedPath && e.composedPath());
        if (path.includes(element)) return

        hidePopup(element)
        // element.classList.remove('fadeIn')
        // setTimeout(() => {
        //     element.classList.remove(className)
        // }, 200)

        document.body.removeEventListener('click', onClickAndRemove)
    }
    document.body.addEventListener('click', onClickAndRemove)
}

export const showPopup = (popup) => {
    if (!popup.classList.contains('show')) {

        popup.classList.add('show')
        setTimeout(() => {
            popup.classList.add('fadeIn')
            outSideClick(popup)

        }, 200)
    }
}

const hidePopup = (element,className="show") => {
    element.classList.remove('fadeIn')
    setTimeout(() => {
        element.classList.remove(className)
    }, 200)
}