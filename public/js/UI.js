
class UI{


    renderCards(catalogos){
    const cards    = document.getElementById('cards');
    const template = document.getElementById('template-card').content
    const fragment = document.createDocumentFragment();

    catalogos.forEach( catalogo => {
     
    template.querySelector('h5').textContent = `${catalogo.marca} ${catalogo.modelo}`;
    template.querySelector('#cantidad').textContent = catalogo.cantidad;
    template.getElementById('serie').textContent = catalogo.serie;
    template.querySelector('button').id = catalogo.idMultifuncional; 
    const clone = template.cloneNode(true);
    fragment.appendChild(clone); 
 });
 cards.appendChild(fragment);
}

    viewModal(){
        let popup = document.getElementById('popup');
        popup.style.visibility = 'visible';
        popup.style.opacity = 1;
    }

    hiddenModal(){
        let popup = document.getElementById('popup');
        popup.style.visibility = 'hidden';
        popup.style.opacity = 0;
    }



}