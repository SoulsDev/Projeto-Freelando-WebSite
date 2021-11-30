function modalAtiva(modalID) {
    const modal = document.getElementById(modalID);
    modal.classList.add('ativo');

    modal.addEventListener('click', (e) => {
        if (e.target.id == modalID || e.target.name == 'btn-fechar') {
            modal.classList.remove('ativo');

        }
    });
}



const publicar = document.getElementById('novo-publicacao');
publicar.addEventListener('click', () => modalAtiva('modal-publicacao'));

const interesse = document.getElementById('edit-interesses');
interesse.addEventListener('click', () => modalAtiva('modal-interesse'));

const formacoes = document.getElementById('edit-formacoes');
formacoes.addEventListener('click', () => modalAtiva('modal-formacao'));

const dadospessoais = document.getElementById('edit-dadospessoais');
dadospessoais.addEventListener('click', () => modalAtiva('modal-dadospessoais'));