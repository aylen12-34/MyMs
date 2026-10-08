function buscarProducto(){
    var nombre = document.getElementById("textoBuscar").value.trim();
    if(nombre === ""){
        document.getElementById("productosbusqueda").innerHTML = "";
        return;
    }
    fetch("buscar_producto.php?nombre=" + encodeURIComponent(nombre))
    .then(res => res.json())
    .then(data => {
        console.log(data);
        var html = "";
        data.forEach(producto => {
            html += `
            <div class="tarjeta">
                <button
    class="btnAgregarBusqueda"
    data-codigo="${producto.Codigo}"
    ${pedidoActivo ? "" : "disabled"}>
    ${pedidoActivo ? "🛒 Agregar" : "🚫 Pedido no activo"}
</button>
                <img
                    src="../../${producto.imagen}"
                    alt="${producto.Nombre}">
                <div class="infoDetalle">
                    <h3>${producto.Nombre}</h3>
                    <div class="precioDescripcion">
                        <h2>Bs ${producto.Precio}</h2>
                        <p class="descripcionProducto">
                            ${producto.Descripcion}
                        </p>
                        <p class="detalladoProducto">
                            ${producto.Detallado}
                        </p>
                    </div>
                </div>
            </div>
            `;
        });
        document.getElementById("productosbusqueda").innerHTML = html;

        //========================================
        // BOTONES AGREGAR DE LOS RESULTADOS
        //========================================
        document.querySelectorAll(".btnAgregarBusqueda")
        .forEach(boton => {
            boton.addEventListener("click", () => {
                agregarProducto(boton.dataset.codigo);
            });
        });
    })
    .catch(error => {
        console.error("Error en la búsqueda:", error);
    });
}

let tiempoBusqueda;
document.getElementById("textoBuscar")
.addEventListener("input", function(){
    clearTimeout(tiempoBusqueda);
    tiempoBusqueda = setTimeout(function(){
        buscarProducto();
    }, 300);
});