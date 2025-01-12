const fileInput = document.getElementById('file');
const fileButton = document.getElementById('button')
//show file name 
const fileLabel = document.getElementById('label')
//parent div of input, image, label
const div = document.getElementById('image-div');
//create empty image variable for displaying user image
let image
fileButton.addEventListener("click", () => {
    fileInput.click();
})

//set up file limits
const MAX_FILE_SIZE = 2 * 1024 * 1024; // 2 MB
const ALLOWED_TYPES = ['image/jpeg', 'image/png', 'image/jpg'];

fileInput.addEventListener('change', () => {
    if (fileInput.files.length > 0) {
        const file = fileInput.files[0];
        console.log(file)
        if (!ALLOWED_TYPES.includes(file.type)) {
            fileLabel.textContent = 'Tip de fișier invalid. Sunt acceptate doar JPG, JPEG sau PNG .';
            fileLabel.className = "text-red-600"
            return
        }
        if (file.size > MAX_FILE_SIZE) {
            fileLabel.textContent = `Fișierul selectat este prea mare. Limita este de 2 MB.`;
            fileLabel.className = "text-red-600"
            return;
        }
        let url = window.URL.createObjectURL(file)
        fileLabel.textContent = `Ați selectat: ${file.name}`
        fileLabel.className = "text-black"
        //check if there is an image laready loaded

        if (!image) {
            image = document.createElement('img');
            div.appendChild(image);
        };
        image.src = url;
        image.width = 400;
        image.heigh = 400;
        image.alt = file.name;
        image.onload = () => URL.revokeObjectURL(url);

    }
})
