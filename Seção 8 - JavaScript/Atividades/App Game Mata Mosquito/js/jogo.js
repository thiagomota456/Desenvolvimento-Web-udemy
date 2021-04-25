//Encontrar altura e largura do site
var height = 0
var width = 0
var vidas = 1
var tempo = 15

var criaMosquitotempo = 1500

var nivel = window.location.search
nivel = nivel.replace('?', '')
if(nivel === 'normal'){
    //1500
    criaMosquitotempo = 1500
}
else if(nivel === 'dificil'){
    //1000
    criaMosquitotempo = 1000
}
else if(nivel === 'chucknorris'){
    //750
    criaMosquitotempo = 750
}

function ajustaTamanhoPalcoJogo(){
    height = window.innerHeight
    width = window.innerWidth

    console.log(height, width)
}

ajustaTamanhoPalcoJogo()

var cronometro = setInterval(function(){
    tempo -=1
    if(tempo < 0){
        clearInterval(cronometro)
        clearInterval(criaMosquito)
        window.location.href = 'vitoria.html'
    }
    else{
        document.getElementById('cronometro').innerHTML = tempo
    }
    
},1000)

function posicaoRandomica(){
    //Remover caso exista
    if(document.getElementById('mosquito')){
        document.getElementById('mosquito').remove()
        if(vidas > 3){
            window.location.href = 'fim_de_jogo.html'
        }else{
            document.getElementById('v' + vidas).src = '../imagens/coracao_vazio.png'
            vidas++
        }
        
    }
    //criar mosquito
    var posicaoX = Math.floor(Math.random() * width) - 90
    var posicaoY =  Math.floor(Math.random() * height) - 90
    
    posicaoX = posicaoX < 0 ? 0 : posicaoX 
    posicaoY = posicaoY < 0 ? 0 : posicaoY

    console.log(posicaoX, posicaoY)

    

    //Criar elemento html
    var mosquito = document.createElement('img')
    mosquito.src = 'imagens/mosquito.png'
    mosquito.className = tamanhoALeatorio() +' '+ ladoAleatorio()
    mosquito.style.left = posicaoX + "px"
    mosquito.style.top = posicaoY + "px"
    mosquito.style.position = 'absolute'
    mosquito.id = 'mosquito'
    mosquito.onclick = function(){
        this.remove()
    }

    document.body.appendChild(mosquito)

    document.body.style.height = height
    document.body.style.height = width


}
 
function tamanhoALeatorio(){
    var classe = Math.floor(Math.random() * 3)
    
    switch(classe){
        case 0:
            return 'mosquito1'
        case 1:
            return 'mosquito2'
        case 2:
            return 'mosquito3'
    }
}

function ladoAleatorio(){

    var classe = Math.floor(Math.random() * 2)

    switch(classe){
        case 0:
            return 'ladoA'
        case 1:
            return 'ladoB'
    }
}