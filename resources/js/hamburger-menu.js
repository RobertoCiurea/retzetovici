const hamburger = document.getElementById('hamburger');
const lines = document.querySelectorAll('#line');
const slider = document.getElementById('slider');
const list = document.getElementById('list');
let clicked = false;
console.log(lines)
hamburger.addEventListener('click', () => {
    clicked = !clicked
    switch (clicked) {
        case true:
            lines[1].style.opacity = '0';
            lines[0].style.transform = 'translate(0, 0) rotate(-45deg)';
            lines[2].style.transform = 'translate(0,-1.3rem) rotate(45deg)';
            slider.style.width = '100%';
            list.classList.remove('hidden')
            list.classList.add('flex')
            break;
        case false:
            lines[1].style.opacity = '1';
            lines[0].style.transform = 'translate(0, 0) rotate(0)';
            lines[2].style.transform = 'translate(0,0) rotate(0)';
            slider.style.width = '0';
            list.classList.add('hidden')
            list.classList.remove('flex')
    }
})