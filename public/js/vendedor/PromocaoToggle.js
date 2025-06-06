document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.getElementById('toggle-promotion');
    const promoContainer = document.getElementById('promocao_container');
    const inputs = promoContainer.querySelectorAll('input');

    if (toggle && promoContainer) {
        function updateInputs() {
            const isChecked = toggle.checked;
            inputs.forEach(input => {
                if (input !== toggle) {
                    input.disabled = !isChecked;
                }
            });
        }

        toggle.addEventListener('change', updateInputs);
        updateInputs();
    }
});
