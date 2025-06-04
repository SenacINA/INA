document.addEventListener('DOMContentLoaded', function () {
    const dropdownToggle = document.querySelector('.dropdown-toggle');
    const filtros = document.querySelector('.filtros');
    const filterContainers = document.querySelectorAll('.container_filtro');

    if (dropdownToggle) {
        dropdownToggle.addEventListener('click', function () {
            filtros.classList.toggle('active');
            this.querySelector('img').classList.toggle('rotated');
        });
    }

    filterContainers.forEach(container => {
        const titulo = container.querySelector('.titulo_filtro');

        titulo.addEventListener('click', function () {
            if (window.innerWidth > 1024 || filtros.classList.contains('active')) {
                container.classList.toggle('active_filter');
            }
        });
    });
    document.addEventListener('click', function (e) {
        if (!e.target.closest('.mobile-filters-dropdown') &&
            !e.target.closest('.filtros')) {
            if (filtros) {
                filtros.classList.remove('active');
                if (dropdownToggle) {
                    dropdownToggle.querySelector('img').classList.remove('rotated');
                }
            }
        }
    });
});

const filtroCheckboxes = document.querySelectorAll('input[id="categoria-checkbox"]');
filtroCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('click', async () => {
        const formData = new FormData();
        formData.append('subcategoria', checkbox.value);
        await fetch('FiltroSubcategoria', {
            method: "post",
            body: formData
        }).then(window.location.reload())
    })
});