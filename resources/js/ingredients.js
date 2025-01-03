const button = document.getElementById("add-ingredient");
const section = document.getElementById("ingredients");

function createIngredientInput() {
    const div = document.createElement('div');
    div.classList = "flex gap-3 items-center";

    const input = document.createElement('input');
    input.className = "px-2 py-1 rounded-lg bg-white text-black shadow xl placeholder:text-gray-400";
    input.name = "ingredients[]";

    const image = document.createElement('img');
    image.src = '/icons/close-icon.svg';
    image.width = 30;
    image.height = 30;
    image.alt = "Sterge ingredient";
    image.title = "Sterge ingredient"
    image.className = "cursor-pointer";

    div.appendChild(input);
    div.appendChild(image);

    image.addEventListener("click", () => {
        div.remove();
        updateCounters();
    });

    return div;
}

function updateCounters() {
    Array.from(section.children).forEach((child, index) => {
        const input = child.children[0];
        input.placeholder = `Ingredient ${index + 2}`;
    });
}


button.addEventListener("click", () => {
    const ingredientInput = createIngredientInput();
    section.appendChild(ingredientInput);
    updateCounters();
});
