function formatarMoeda(input) {
    let value = input.value.replace(/\D/g, "");
    value = (parseFloat(value) / 100).toFixed(2).replace(".", ",");
    input.value = value === "NaN" ? "0,00" : value;
    console.log(input.value);
}

function formatarPorcentagem(input) {
    let value = input.value.replace(/\D/g, ""); // Remove non-digit characters
    value = Math.min(100, Math.max(0, parseInt(value) || 0)); // Limit between 0 and 100
    input.value = value.toString(); // Update input value
    console.log(input.value);
}
