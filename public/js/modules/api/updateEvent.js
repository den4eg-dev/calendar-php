export const updateEvent = async (formData) => {

    const updatedEvent = await fetch(`https://www.calendar.den-kaz.com/api/event`,
        {
            method: 'POST',
            body: formData,
        })
    return await updatedEvent.json()
}
// 'Content-Type': 'multipart/form-data'
// 'Accept': 'application/json'