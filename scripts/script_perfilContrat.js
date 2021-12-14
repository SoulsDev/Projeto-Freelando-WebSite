function TornarAtivo(indice){
    // pega a div com todos os links e divs para tornar ativo/desativo;
    div_pai = document.getElementById("links_ativos");
    // pega a div com a cor e o texto para remover a classe 
    div_remover_classe = document.getElementsByClassName('menu-perfil');
    texto_remover_classe = document.getElementsByClassName('fonte-violeta');

    // remove a classe perdendo a estlização do css
    div_remover_classe[0].classList.remove('menu-perfil');
    texto_remover_classe[0].classList.remove('fonte-violeta');
    
    // Adiciona a classe no elemento clicado para adicionar a estilização
    div_pai.children[indice].children[0].classList.add('menu-perfil');
    div_pai.children[indice].children[1].classList.add('fonte-violeta');
    
    formularios = document.getElementsByClassName('formulario');

    for(i=0; i<formularios.length; i++){
        if(!(formularios[i].classList.contains('d-none'))){

            formularios[i].classList.add('d-none')
        }
        
    }    
    formularios[indice].classList.remove('d-none');
}