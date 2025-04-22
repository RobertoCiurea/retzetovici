const categories = document.querySelectorAll('[data-category]');

categories.forEach((category) => {
    const label = formatCategory(category.textContent.trim());
    category.textContent = label
})
function formatCategory(value) {
 
    console.log(value)
    switch (value) {
        case "fast_recipes":
            return "Rețete rapide";
        case "fasting_recipes":
            return "Rețete de post";
        case "international_recipes":
            return "Rețete internaționale";
        case "traditional_recipes":
            return "Rețete tradiționale";
        case "vegan_recipes":
            return "Rețete vegetariene/vegane";
        case "maincourse_recipes":
            return "Feluri principale";
        case "pizza_pasta_recipes":
            return "Pizza și paste";
        case "soup_recipes":
            return "Supe și ciorbe";
        case "fish_recipes":
            return "Pește și fructe de mare";
        case "dessert_recipes":
            return "Deserturi";
        default:
            return "Rețete delicioase";
    }
}
