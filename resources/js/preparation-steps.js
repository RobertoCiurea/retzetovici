const button = document.getElementById("add-step");
const section = document.getElementById("preparation-steps");

function addPreparationStep() {
    const daddyDiv = document.createElement("div");
    daddyDiv.classList = "flex flex-col"

    const div = document.createElement('div');
    div.classList = "flex gap-3 items-start"

    const textarea = document.createElement('textarea');
    textarea.classList = "px-2 py-1 rounded-lg bg-white text-black shadow xl"
    textarea.cols = 30;
    textarea.rows = 7;
    textarea.name = "steps[]";

    const label = document.createElement('label');
    label.classList = "text-sm md:text-base font-semibold underline"
    label.htmlFor = "preparation[]";

    const image = document.createElement('img');
    image.src = '/icons/close-icon.svg';
    image.width = 30;
    image.height = 30;
    image.alt = "Sterge pas";
    image.title = "Sterge pas"
    image.className = "cursor-pointer";

    div.appendChild(textarea)
    div.appendChild(image)
    daddyDiv.appendChild(label);
    daddyDiv.appendChild(div);

    image.addEventListener("click", () => {
        daddyDiv.remove();
        updateCounters();
    });

    return daddyDiv;
}

function updateCounters() {
    Array.from(section.children).forEach((child, index) => {
        child.children[0].textContent = `Pasul #${index + 2}`
    })
}



button.addEventListener("click", () => {

    const preparationStepInput = addPreparationStep();

    section.appendChild(preparationStepInput)
    updateCounters()
})