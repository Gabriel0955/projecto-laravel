let foto1 = document.getElementById('foto1')
let foto2 = document.getElementById('fotp')
let foto3 = document.getElementById('foto3')

let muestra1 = document.getElementById('lk')
let muestra2 = document.getElementById('lk1')
let muestra3 = document.getElementById('lk2')

muestra2.style.display="none"
muestra3.style.display="none"
function ver1(){
    muestra2.style.display = "block"
    muestra1.style.display = "none"
    muestra3.style.display = "none"

}
function ver2(){
    muestra1.style.display = "block"
    muestra2.style.display = "none"
    muestra3.style.display = "none"

}
function ver3(){
    muestra3.style.display = "block"
    muestra2.style.display = "none"
    muestra1.style.display = "none"

}
foto2.addEventListener('click',ver1)
foto1.addEventListener('click',ver2)
foto3.addEventListener('click',ver3)