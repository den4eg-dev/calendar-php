import {hidePopup, showPopup} from "./helpers.js";
import {updateEvent} from "./api/updateEvent.js";


const onTypeClick = (e, target, eventPk) => {
    e.preventDefault()
    const typePopup = target.querySelector('.popup')

    // showPopup(typePopup)

    typePopup.classList.add("show")
    setTimeout(() => {
        typePopup.classList.add("fadeIn")
    }, 200)

    const typeElements = typePopup.querySelectorAll(".item")

    typeElements.forEach(item => {

        item.addEventListener("click", (e) => {
            e.preventDefault()
            const currentType = typePopup.parentNode.querySelector(".current-item")
            let typePk = item.getAttribute("data-id")
            let currentTypePk = currentType.getAttribute("data-id")

            if (typePk === currentTypePk) return

            if (eventPk) {
                const formData = new FormData()

                formData.append('event', 'update')
                formData.append('event_pk', `${eventPk}`)
                formData.append('type_fk', `${typePk}`)

                updateEvent(formData).then(res => {
                    const {event_pk, type_name} = res

                    const id = `[data-id="${event_pk}"]`

                    const quickEventEl = document.querySelector(id)

                    let className = ""
                    let oldClass = quickEventEl.className.split(' ')
                    oldClass.forEach(str => {
                        if (str.match(/type--clr-/g)) className = str
                    })

                    quickEventEl.classList.remove(className)
                    quickEventEl.classList.add("type--clr-" + type_name)


                    // typePopup.classList.remove("show")
                    // hidePopup(typePopup)
                })
            }

            currentType.className = `current-item type--clr-${item.innerText}`
            currentType.setAttribute("data-id", typePk)

            const hiddenInput = target.querySelector("input[type=hidden]")
            hiddenInput ? hiddenInput.value = typePk : null

            typePopup.classList.remove("fadeIn")
            setTimeout(() => {
                typePopup.classList.remove("show")
            }, 200)
        })
    })


}

export const eventTypesHandler = (element, eventPk) => {
    const typePopup = element.querySelector('.create-event__type')
    typePopup.addEventListener('click', function (e) {
        onTypeClick(e, this, eventPk)
    })
}


