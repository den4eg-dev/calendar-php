export const getOneEvent = async (pk) => {
    const event = await fetch(`https://www.calendar.den-kaz.com/api/event?pk=${pk}`)
    return await event.json()
}

