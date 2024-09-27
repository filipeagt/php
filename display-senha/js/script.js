function proximaSenha() {
    let display = document.getElementById('display')
    const audio = new Audio('audio/bip.mp3')
    setInterval(() => {
        const xhttp = new XMLHttpRequest()
        xhttp.onload = function () {         
            if (this.responseText.padStart(3,'0') != display.innerHTML){   
                display.innerHTML = this.responseText.padStart(3,'0')
                audio.play()
            }
        }
        xhttp.open("GET", "data/senha.txt", true)
        xhttp.send()
    }, 100);
}

function habilitaSom() {
    let mensagem = document.getElementById('msg')
    mensagem.style.color = 'black'
}