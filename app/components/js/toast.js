export function gerarToast(mensagem, tipo) {

    let container = document.querySelector('.notification-container');

    if (!container) {
        container = document.createElement('div');
        container.classList.add('notification-container');
        document.body.appendChild(container);
    }

    switch (tipo) {
        case 'erro':

            break
    }

}

function retornarToast (mensagem, icon, classe) {

}