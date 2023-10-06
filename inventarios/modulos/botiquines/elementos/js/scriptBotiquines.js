document.addEventListener("DOMContentLoaded", function () {
    const input = document.getElementById("id_botiquin");
    const sugerencias = document.getElementById("ID_Botiquin_Div");
  
    input.addEventListener("input", function () {
      const valor = input.value;
      sugerencias.innerHTML = "";
  
      if (valor.length > 0) {
        fetch("buscar_botiquines.php?q=" + valor)
          .then((response) => response.json())
          .then((data) => {
            data.forEach((item) => {
              const suggestion = document.createElement("div");
              suggestion.textContent = item.Nombre + " ubicado en " + item.Ubicacion;
              suggestion.addEventListener("click", function () {
                input.value = item.Nombre + " ubicado en " + item.Ubicacion;
                sugerencias.innerHTML = "";
                // Aquí puedes hacer algo con el ID, por ejemplo, enviarlo a otro campo oculto
                document.getElementById("producto_id").value = item.ID; // Asigna el ID al campo oculto
                console.log("ID asignado al campo oculto: " + item.ID);
              });
              sugerencias.appendChild(suggestion);
            });
          });
      }
    });
  });
  