export function gerarToast(mensagem, tipo) {
    let container = document.querySelector('.notification-container');

    if (!container) {
        container = document.createElement('div');
        container.classList.add('notification-container');
        document.body.appendChild(container);
    }

    const toast = retornarToast(mensagem, tipo);
    if (toast) {
        container.appendChild(toast);

        const duration = 5000;

        setTimeout(() => {
            toast.classList.add('slide-out-right'); 
            setTimeout(() => {
                toast.remove();
            }, 300); 
        }, duration);
    }
}

function retornarToast(mensagem, tipo) {
    let classe = '';
    let svgIcon = '';

    switch (tipo) {
        case 'sucesso':
            classe = 'success';
            svgIcon = `
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                </svg>
            `;
            break;
        case 'erro':
            classe = 'error';
            svgIcon = `
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                </svg>
            `;
            break;
        case 'aviso':
            classe = 'warning';
            svgIcon = `
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                </svg>
            `;
            break;
        case 'info':
            classe = 'info';
            svgIcon = `
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                </svg>
            `;
            break;
    
    }

    const toast = document.createElement('li');
    toast.classList.add('notification-item', classe);

    toast.innerHTML = `
        <div class="notification-content">
            <div class="notification-icon">${svgIcon}</div>
            <div class="notification-text">${mensagem}</div>
        </div>
        <div class="notification-icon notification-close">
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"></path>
            </svg>
        </div>
        <div class="notification-progress-bar"></div>
    `;

    toast.querySelector('.notification-close').addEventListener('click', () => {
        toast.classList.add('slide-out-right');
        setTimeout(() => {
            toast.remove();
        }, 300); 
    });

    return toast;
}

window.gerarToast = gerarToast;