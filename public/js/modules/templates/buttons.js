export const createBtn = (className = '') => {


    return ` <div class="m-auto">
                <button name="create" type="submit" class="btn btn--radius ${className}">Create</button>
            </div>`
}

export const deleteBtn = (className = '') => {
    return ` <div class="m-auto">
                <button name="delete" type="submit" class="btn btn--radius btn--delete ${className}">Delete</button>
            </div>`
}