const difficulties = document.querySelectorAll('#difficulty');
const difficultiesArray = Array.from(difficulties);

difficulties.forEach((difficulty) => {
    const label = formatDifficulty(difficulty.textContent);
    difficulty.textContent = label;
})

function formatDifficulty(value) {
    switch (value) {
        case 'easy':
            return 'Ușoară';
        case 'medium':
            return 'Medie';
        case 'difficult':
            return 'Dificilă';
    }
}