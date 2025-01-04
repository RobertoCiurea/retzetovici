const section = document.getElementById('tags');
const button = document.getElementById('add-tag')

const recipeTags = [
    { value: "appetizer", label: "Aperitiv" },
    { value: "salad", label: "Salată" },
    { value: "snack", label: "Gustare" },
    { value: "breakfast", label: "Mic Dejun" },
    { value: "lunch", label: "Prânz" },
    { value: "dinner", label: "Cină" },
    { value: "vegan", label: "Vegan" },
    { value: "gluten_free", label: "Fără Gluten" },
    { value: "keto", label: "Keto" },
    { value: "paleo", label: "Paleo" },
    { value: "low_carb", label: "Low Carb" },
    { value: "high_protein", label: "High Protein" },
    { value: "grill", label: "Grătar" },
    { value: "baked", label: "Copt" },
    { value: "seafood", label: "Fructe de Mare" },
    { value: "dessert", label: "Desert" },
    { value: "drink", label: "Băutură" },
    { value: "soup", label: "Supă" },
    { value: "stew", label: "Tocană" },
    { value: "bread", label: "Pâine" },
    { value: "pastry", label: "Patiserie" },
    { value: "pasta", label: "Paste" },
    { value: "rice", label: "Orez" },
    { value: "comfort_food", label: "Comfort Food" },
    { value: "spicy", label: "Picant" },
    { value: "sweet", label: "Dulce" },
    { value: "sour", label: "Acru" },
    { value: "quick", label: "Rapid" },
    { value: "healthy", label: "Sănătos" },
    { value: "budget_friendly", label: "Economic" },
    { value: "holiday", label: "Sărbători" },
    { value: "christmas", label: "Crăciun" },
    { value: "easter", label: "Paște" },
    { value: "valentines", label: "Valentine's Day" },
    { value: "bbq", label: "BBQ" },
    { value: "asian", label: "Asiatic" },
    { value: "italian", label: "Italian" },
    { value: "mexican", label: "Mexican" },
    { value: "indian", label: "Indian" },
    { value: "mediterranean", label: "Mediterranean" },
    { value: "fusion", label: "Fusion" }
];


function createTag() {

    const daddyDiv = document.createElement('div');
    daddyDiv.classList = "flex flex-col gap-2"

    const div = document.createElement('div')
    div.className = "flex gap-3 items-center"


    const label = document.createElement('label')
    label.className = "font-semibold underline"
    label.htmlFor = "tags[]";

    const image = document.createElement('img');
    image.src = '/icons/close-icon.svg';
    image.width = 30;
    image.height = 30;
    image.alt = "Sterge eticheta";
    image.title = "Sterge eticheta";
    image.className = "cursor-pointer";

    const select = document.createElement('select');
    select.name = "tag[]";
    select.className = "px-2 py-1 rounded-lg bg-white text-black shadow xl placeholder:text-gray-400";

    recipeTags.forEach((tag) => {
        const option = document.createElement('option')
        option.value = tag.value
        option.textContent = tag.label
        select.appendChild(option)
    })

    div.appendChild(select)
    div.appendChild(image)

    daddyDiv.appendChild(label)
    daddyDiv.append(div)


    image.addEventListener("click", () => {
        daddyDiv.remove();
        updateCounters();
    });

    return daddyDiv;

}


button.addEventListener("click", () => {
    const tag = createTag()
    section.appendChild(tag)
    updateCounters()
})

function updateCounters() {
    Array.from(section.children).forEach((child, index) => {
        child.children[0].textContent = `Eticheta ${index + 2}`
    })
}