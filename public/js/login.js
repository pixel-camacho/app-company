document.getElementById('view').addEventListener('click',mostrarOcultar);

function mostrarOcultar(){
    let campo = document.getElementById('pass');
    let icono = document.getElementById('view');

    if(campo.type === "password"){

      icono.className = 'fa fa-eye show';
      campo.setAttribute('type','text');
    }else{

    icono.className = 'fa fa-eye-slash show';
    campo.setAttribute('type','password');
    }
}

setTimeout(()=>{
let alerta = document.querySelector('.success');
alerta.style.display = 'none';
},3500);

setTimeout(()=>{
  let alerta = document.querySelector('.error');
  alerta.style.display = 'none';
  },3500);