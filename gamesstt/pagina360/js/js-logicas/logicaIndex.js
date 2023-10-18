AFRAME.registerComponent('shootable', {
init: function () {
    this.el.addEventListener('click', () => {
        Swal.fire({
            title: `<h1 style="display:flex; margin:auto; width: 200px; height: 200px;background-image: url(./img/logoVerde.png);background-size: cover;background-attachment: contain;background-position: center;"></h1><h2 style="color: white; font-size: 25px;">En el escenario del internado podrás interactuar buscando elementos relacionados a SST mediante acertijos. Esto con un entorno de 360°.</h2>`,
            html: '<h2 style="color: white;">Para conocer más, preciona el botón de "Sí, quiero ir" y diviertete aprendiendo.</h2>',
            background: '#000000e9',
            icon: 'warning',
            width: '40%',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, quiero ir.',
            cancelButtonText: 'Cancelar',
            BackDrop: true,
            allowEscapeKey : false,
            allowOutsideClick: false,
            allowSideClick: false,
            allowEnterKey: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "./internado.php";
            }
        });
    })
}
})