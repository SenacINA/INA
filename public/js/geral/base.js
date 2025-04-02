function pag(url, loc = 1, params = "") {
    if (loc === 0) {
        window.location.href = "./pages/" + url + ".php" + params;
    } else {
        window.location.href = "../".repeat(loc ?? 1) + url + ".php" + params;
    }
}

function selectPag(event){
    pag(event);
}

function login(){
    switch (document.getElementById("email").value) {
        case "admin":
            pag("admin/dashboard");
            break;
        case "vendedor":
            pag("vendedor/perfil_vendedor");
            break;
        case "cliente":
            pag("cliente/perfil_cliente");
            break;
        default:
            alert("Login Incorreto");
            break;
    }
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
    openModalBtn.addEventListener('click', openModal);
    closeModalBtn.addEventListener('click', closeModal);
    modalContainer.addEventListener('click', handleOutsideClick);
    logout.addEventListener('click', (e) => {
        const changeble = window.location.href.includes("index") ? "./" : "../../"
        e.preventDefault()
        fetch(`${changeble}model/geral/logout_model.php`, { method: 'POST' })
        .then(response => {
            if(!response.ok)return

            if(window.location.href.includes("index")){
                window.location.href = "./index.php"
                return
            }
            window.location.href = "../../index.php"
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    // Polyfill for inert if not supported
    if (!('inert' in HTMLElement.prototype)) {
        console.warn('The "inert" attribute is not supported in this browser. Accessibility may be affected.');
        
        // Simple focus trap as fallback
        modal.addEventListener('keydown', (event) => {
            if (event.key === 'Tab') {
                const focusableElements = modal.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
                const firstElement = focusableElements[0];
                const lastElement = focusableElements[focusableElements.length - 1];
                
                if (event.shiftKey && document.activeElement === firstElement) {
                    event.preventDefault();
                    lastElement.focus();
                } else if (!event.shiftKey && document.activeElement === lastElement) {
                    event.preventDefault();
                    firstElement.focus();
                }
            }
        });
    }
});