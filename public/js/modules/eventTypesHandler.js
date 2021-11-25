import {hidePopup, showPopup} from "./helpers.js";


const onTypeClick = (e,target) => {
    e.preventDefault()
    const typePopup = target.querySelector('.popup')
    // showPopup(typePopup)
    typePopup.classList.add("show")
    setTimeout(()=>{
        typePopup.classList.add("fadeIn")
    },200)

    const typeElements = typePopup.querySelectorAll(".item")

    typeElements.forEach(item => {

        item.addEventListener("click", (e) => {
            e.preventDefault()
            const currentType = typePopup.parentNode.querySelector(".current-item")
            let typePk = item.getAttribute("data-id")
            let currentTypePk = currentType.getAttribute("data-id")

            if (typePk === currentTypePk) return
            currentType.className = `current-item type--clr-${item.innerText}`
            currentType.setAttribute("data-id", typePk)

            const hiddenInput = target.querySelector("input[type=hidden]")
            hiddenInput ? hiddenInput.value = typePk : null
            // hidePopup(typePopup)




            typePopup.classList.remove("fadeIn")
            setTimeout(()=>{
                typePopup.classList.remove("show")
            },200)

        })
    })




}

export const eventTypesHandler = (element) => {
    const typePopup = element.querySelector('.create-event__type')
    typePopup.addEventListener('click', function (e) {
        onTypeClick(e,this)
    })
}


