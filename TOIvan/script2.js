function mostrarOtro() {
    var riesgoSelect = document.getElementById("contexto");
    var otroRiesgoDiv = document.getElementById("otroRiesgo");
    var otroRiesgoInput = document.getElementById("otroRiesgoInput");

    if (riesgoSelect.value === "otro") {
        otroRiesgoDiv.style.display = "block";
        otroRiesgoInput.setAttribute("required", "required");
    } else {
        otroRiesgoDiv.style.display = "none";
        otroRiesgoInput.removeAttribute("required");
    }
}
