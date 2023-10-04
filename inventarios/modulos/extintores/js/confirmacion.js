function confirmacion() {
 
  let resultado = confirm("¿Esta seguro de que quiere eliminar este registro?");

  if (resultado == true) {
    return true;
  } else {
    return false;
  }
}
