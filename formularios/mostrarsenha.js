let botaoX = document.querySelector('#lbleye');
let botaoSenha = document.querySelector('#senha');
let imgEye = document.querySelector('#eye');

botaoX.addEventListener('click', ()=>{
    botaoSenha.type === 'password'? showPassword (): hidePassword();
})

function hidePassword(){
    botaoSenha.type = 'password';
    imgEye.setAttribute('src', 'view.svg');
}
function showPassword(){
    botaoSenha.type = 'text';
    imgEye.setAttribute('src', 'hidden.svg');
}