// @ts-check

/**
 * Redireciona o usuário para página
 * @param {string} url 
 * @param {string} params SearchParams
 */
function pag(url = "", params = "") {
    const base = window.location.origin + "/INA/";
    window.location.href = base + url + params;
}

function selectPag(valor){
    pag(valor);
}

document.addEventListener('DOMContentLoaded', () => {
    const openModalBtn = document.getElementById('baseNavSideBar');
    const closeModalBtn = document.getElementById('close-modal');
    const modalContainer = document.getElementById('modal-container');
    const modal = document.getElementById('modal');
    const logout = document.getElementById('sideBarLogout');

    // Function to open the modal
    function openModal() {
        // Show the modal container
        if(!modalContainer || !modal)return
        modalContainer.removeAttribute('hidden');
        modalContainer.removeAttribute('inert');
        
        // Set focus to the modal
        modal.focus();
        
        // Announce to screen readers that a dialog has opened
        const announcement = document.createElement('div');
        announcement.setAttribute('role', 'status');
        announcement.setAttribute('aria-live', 'polite');
        announcement.classList.add('sr-only');
        announcement.textContent = 'Menu de navegação aberto';
        document.body.appendChild(announcement);
        
        // Remove the announcement after it's been read
        setTimeout(() => {
            document.body.removeChild(announcement);
        }, 1000);
        
        // Add event listener for ESC key
        document.addEventListener('keydown', handleEscKey);
    }

    // Function to close the modal
    function closeModal() {
        if(!modalContainer || !openModalBtn)return
        // Hide the modal container
        modalContainer.setAttribute('hidden', '');
        modalContainer.setAttribute('inert', '');
        
        // Remove ESC key event listener
        document.removeEventListener('keydown', handleEscKey);
        
        // Return focus to the button that opened the modal
        openModalBtn.focus();
    }

    // Function to handle ESC key press
    function handleEscKey(event) {
        if (event.key === 'Escape') {
            closeModal();
        }
    }

    // Function to handle clicks outside the modal
    function handleOutsideClick(event) {
        if (event.target === modalContainer) {
            closeModal();
        }
    }

    // Add event listeners
    openModalBtn && openModalBtn.addEventListener('click', openModal);
    closeModalBtn && closeModalBtn.addEventListener('click', closeModal);
    modalContainer && modalContainer.addEventListener('click', handleOutsideClick);
    logout && logout.addEventListener('click', (e) => {
        e.preventDefault()
        fetch(`../../controllers/geral/LogoutModel.php`, { method: 'POST' })
        .then(response => {
            if(!response.ok)return

            window.location.href = "../geral/home.php"
            return
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    // Polyfill for inert if not supported
    if (!('inert' in HTMLElement.prototype)) {
        console.warn('The "inert" attribute is not supported in this browser. Accessibility may be affected.');
        
        // Simple focus trap as fallback
        modal && modal.addEventListener('keydown', (event) => {
            if (event.key === 'Tab') {
                const focusableElements = modal.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
                const firstElement = focusableElements[0];
                const lastElement = focusableElements[focusableElements.length - 1];
                
                if (event.shiftKey && document.activeElement === firstElement) {
                    event.preventDefault();
                    //@ts-ignore
                    lastElement.focus();
                } else if (!event.shiftKey && document.activeElement === lastElement) {
                    event.preventDefault();
                    //@ts-ignore
                    firstElement.focus();
                }
            }
        });
    }
});