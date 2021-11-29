export const getOneEvent = async (pk) => {
    const event = await fetch(`https://www.calendar.den-kaz.com/api/event?pk=${pk}`)
    return await event.json()
}

export const deleteOneEvent = async (formData) => {

    const deletedEvent = await fetch(`https://www.calendar.den-kaz.com/api/event`,
        {
            method: 'POST',
            body: formData,
        })
    return await deletedEvent.json()
}