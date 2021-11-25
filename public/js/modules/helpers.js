export const outSideClick = (element, remove = false) => {
    const onClickAndRemove = (e) => {
        console.log(element)
        const path = e.path || (e.composedPath && e.composedPath());
        if (path.includes(element) ) return

        hidePopup(element, remove)


        document.body.removeEventListener('click', onClickAndRemove)
    }
    document.body.addEventListener('click', onClickAndRemove)
}


export const showPopup = (popup, remove = false) => {
    if (!popup.classList.contains('show')) {
        popup.classList.add('show')
        setTimeout(() => {
            popup.classList.add('fadeIn')
            outSideClick(popup, remove)
        }, 200)
    }
}

export const hidePopup = (element, remove = false) => {
    element.classList.remove('fadeIn')
    setTimeout(() => {
        remove ? element.remove() : element.classList.remove('show')
    }, 200)
}