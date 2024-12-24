const nameButton = document.getElementById('edit-name')
const nameForm = document.getElementById('name-form')
const name = document.getElementById('name')

const emailButton = document.getElementById('edit-email')
const emailForm = document.getElementById('email-form')
const email = document.getElementById('email')
let clicked = false;

nameButton.addEventListener("click", () => onClick(nameButton, nameForm, name))
emailButton.addEventListener("click", () => onClick(emailButton, emailForm, email))

function onClick(button, form, content) {
    clicked = !clicked
    switch (clicked) {
        case true:
            button.classList = "bg-red-700 hover:bg-red-800 transition-colors px-2 py-1 rounded-lg text-white"
            button.textContent = "Anuleaza"
            content.classList = "hidden"
            form.classList = "flex flex-row mt-5 gap-3"
            break;
        default:
            button.classList = "bg-green-700 hover:bg-green-800 transition-colors px-2 py-1 rounded-lg text-white"
            button.textContent = "Editeaza"
            content.classList = "text-lg italic"
            form.classList = "hidden"

            break

    }
}