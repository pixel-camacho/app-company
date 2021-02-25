setTimeout(()=>{
    if(document.querySelector('.success')){
        let alerta = document.querySelector('.success');
        alerta.style.display = 'none';
    }
    },3500);
    
    setTimeout(()=>{
        if(document.querySelector('.error')){
            let alerta = document.querySelector('.error');
            alerta.style.display = 'none';      
        }
      },3500);