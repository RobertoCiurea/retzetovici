const tags = document.querySelectorAll('#tag');
const tagsArray = Array.from(tags)

tagsArray.forEach((tag) => {
    const label = formatTag(tag.textContent)
    tag.textContent = label;
})

function formatTag(value) {
    switch (value) {
        case 'appetizer':
            return 'Aperitiv';
        case 'salad':
            return 'Salată';
        case 'snack':
            return 'Gustare';
        case 'breakfast':
            return 'Mic Dejun';
        case 'lunch':
            return 'Prânz';
        case 'dinner':
            return 'Cină';
        case 'vegan':
            return 'Vegan';
        case 'gluten_free':
            return 'Fără Gluten';
        case 'keto':
            return 'Keto';
        case 'paleo':
            return 'Paleo';
        case 'low_carb':
            return 'Low Carb';
        case 'high_protein':
            return 'High Protein';
        case 'grill':
            return 'Grătar';
        case 'baked':
            return 'Copt';
        case 'seafood':
            return 'Fructe de Mare';
        case 'dessert':
            return 'Desert';
        case 'drink':
            return 'Băutură';
        case 'soup':
            return 'Supă';
        case 'stew':
            return 'Tocană';
        case 'bread':
            return 'Pâine';
        case 'pastry':
            return 'Patiserie';
        case 'pasta':
            return 'Paste';
        case 'rice':
            return 'Orez';
        case 'comfort_food':
            return 'Comfort Food';
        case 'spicy':
            return 'Picant';
        case 'sweet':
            return 'Dulce';
        case 'sour':
            return 'Acru';
        case 'quick':
            return 'Rapid';
        case 'healthy':
            return 'Sănătos';
        case 'budget_friendly':
            return 'Economic';
        case 'holiday':
            return 'Sărbători';
        case 'christmas':
            return 'Crăciun';
        case 'easter':
            return 'Paște';
        case 'valentines':
            return 'Valentine\'s Day';
        case 'bbq':
            return 'BBQ';
        case 'asian':
            return 'Asiatic';
        case 'italian':
            return 'Italian';
        case 'mexican':
            return 'Mexican';
        case 'indian':
            return 'Indian';
        case 'mediterranean':
            return 'Mediterranean';
        case 'fusion':
            return 'Fusion';
        default:
            return 'Delicios';
    }
}
