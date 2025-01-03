const fileInput = document.getElementById('file');
const fileButton = document.getElementById('button')
//show file name 
const fileLabel = document.getElementById('label')

fileButton.addEventListener("click", () => {
    fileInput.click();
})

fileInput.addEventListener('change', () => {
    if (fileInput.files.length > 0) {
        fileLabel.textContent = `Ați selectat: ${fileInput.files[0].name}`

    }
})
