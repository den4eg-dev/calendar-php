export const getTypes = async () => {
    const event = await fetch(`https://www.calendar.den-kaz.com/api/types`)
    return await event.json()
}