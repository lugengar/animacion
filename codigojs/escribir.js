function startTypingEffect(selector, htmlContent) {
    const typedTextSpan = selector;
    typedTextSpan.innerHTML = "";
    const cursorSpan = document.createElement("span");
    cursorSpan.classList.add("cursor");
    typedTextSpan.appendChild(cursorSpan);

    const typingDelay = 30; 
    let charIndex = 0;

    function type() {
        if (charIndex < htmlContent.length) {
            typedTextSpan.insertAdjacentHTML("beforeend", htmlContent[charIndex]);
            charIndex++;
            setTimeout(type, typingDelay);
        } else {
            cursorSpan.style.display = "none"; 
        }
    }

    type();
}


    
cantidad = 90
function lluvia(objeto){

    for (let index = 0; index < cantidad; index++) {
        setTimeout(() => {  
        min= 0
        max = 30
        const numberElement = document.createElement('div');
        numberElement.className = 'number';
        numberElement.textContent = Math.round(Math.random()); 
        numberElement.style.right = `${(Math.random() * (max - min) + min)}vw`; 
        numberElement.style.top = `-5vh`; 
        objeto.appendChild(numberElement);
        setTimeout(() => {
            numberElement.remove(); 
        },4000)
        },index*50); 
    }
}

 