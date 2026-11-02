/* Búsqueda de pedidos desde cualquier NAV de MyMs: no cambia la página ni la URL. */
(() => {
    const form = document.querySelector('.form-buscar-pedido');
    const fondo = document.getElementById('fondoModalPedido');
    if (!form || !fondo) return;

    const input = form.querySelector('input[name="ID"]');
    const boton = form.querySelector('button[type="submit"]');
    const cerrar = document.getElementById('cerrarModalPedido');
    const endpoint = form.dataset.endpoint;
    const endpointURL = new URL(endpoint, document.baseURI);

    const campos = {
        id: document.getElementById('modalPedidoID'),
        nombre: document.getElementById('modalPedidoNombre'),
        fecha: document.getElementById('modalPedidoFecha'),
        estado: document.getElementById('modalPedidoEstado'),
        vendedor: document.getElementById('modalPedidoVendedor')
    };

    function abrirModal() {
        fondo.classList.add('activo');
        fondo.setAttribute('aria-hidden', 'false');
        document.body.classList.add('modal-pedido-abierto');
        cerrar.focus();
    }

    function cerrarModal() {
        fondo.classList.remove('activo');
        fondo.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('modal-pedido-abierto');
    }

    function alertaNoEncontrado(id) {
        const imagen = new URL('../../imagenes/gatocajasad.png', endpointURL).href;
        const sonido = new URL('../../imagenes/gatous.mp3', endpointURL).href;
        if (typeof Swal === 'undefined') {
            window.alert(`No existe ningún pedido con el ID de recibo ${id}.`);
            return;
        }
        Swal.fire({
            title: '¡Pedido no encontrado!',
            text: `No existe ningún pedido con el ID de recibo ${id}.`,
            background: '#FFF8F4', color: '#6A253A', imageUrl: imagen,
            imageHeight: 150, imageAlt: 'Gatito de MyMs',
            confirmButtonText: 'Entendido', confirmButtonColor: '#6A253A',
            customClass: { popup: 'swal-myms', title: 'swal-myms-titulo', confirmButton: 'swal-myms-boton' },
            didOpen: () => {
                const audio = new Audio(sonido);
                const img = Swal.getImage();
                if (img) img.addEventListener('click', () => {
                    audio.currentTime = 0;
                    const p = audio.play();
                    if (p && p.catch) p.catch(() => {});
                });
            }
        });
    }

    form.addEventListener('submit', async (event) => {
        event.preventDefault(); // Impide la redirección GET tradicional.
        const id = input.value.trim();
        if (!/^[0-9]+$/.test(id) || Number(id) < 1) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({ title: 'Revisa el número', text: 'Ingresa un ID de pedido válido.', icon: 'warning', confirmButtonColor: '#6A253A' });
            } else window.alert('Ingresa un ID de pedido válido.');
            input.focus();
            return;
        }

        boton.disabled = true;
        const textoOriginal = boton.textContent;
        boton.textContent = 'Buscando…';
        try {
            const response = await fetch(endpointURL.href, {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8', 'X-Requested-With': 'XMLHttpRequest' },
                body: new URLSearchParams({ id }),
                credentials: 'same-origin'
            });
            const data = await response.json();
            if (!response.ok) throw new Error(data.mensaje || 'No se pudo consultar el pedido.');
            if (!data.ok || !data.pedido) {
                alertaNoEncontrado(id);
                return;
            }

            const pedido = data.pedido;
            campos.id.textContent = pedido.ID ?? id;
            campos.nombre.textContent = pedido.Nombre || 'No especificado';
            campos.fecha.textContent = pedido.Fecha || 'No especificada';
            campos.estado.textContent = pedido.Estado || 'No especificado';
            campos.vendedor.textContent = pedido.NombreVendedor || 'Pendiente';
            const urlRecibo = new URL('recibo.php', endpointURL);
            urlRecibo.searchParams.set('ID', pedido.ID ?? id);
            document.getElementById('enlaceReciboPedido').href = urlRecibo.href;
            cerrarModal();
            abrirModal();
        } catch (error) {
            console.error('Error al consultar el pedido:', error);
            if (typeof Swal !== 'undefined') {
                Swal.fire({ title: 'No se pudo consultar', text: 'Ocurrió un problema al consultar el pedido. Intenta nuevamente.', icon: 'error', confirmButtonColor: '#6A253A' });
            } else window.alert('No se pudo consultar el pedido. Intenta nuevamente.');
        } finally {
            boton.disabled = false;
            boton.textContent = textoOriginal;
        }
    });

    cerrar.addEventListener('click', cerrarModal);
    fondo.addEventListener('click', (event) => { if (event.target === fondo) cerrarModal(); });
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && fondo.classList.contains('activo')) cerrarModal();
    });
})();
