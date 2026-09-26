let listaProductos = [];
let pedidoActivo = false;
document.addEventListener("DOMContentLoaded", () => {
 
verificarPedido();

});



function cargarProductos(){
    fetch("../index/obtener_productos.php").then(respuesta => respuesta.json())

    .then(productos => {

        listaProductos = productos;

        mostrarProductos(productos);

    })

    .catch(error => console.log(error));

}
function mostrarProductos(productos){

    let contenedor = document.getElementById("productos");

    let html = "";

    productos.forEach(producto=>{

        html += `
        <div class="tarjeta">
            <img src="../../${producto.imagen}" alt="${producto.Nombre}">

            <h3>${producto.Nombre}</h3>

            <p>${producto.Descripcion}</p>

            <h2>Bs ${producto.Precio}</h2>

            <button
class="btnAgregar"
data-Codigo="${producto.Codigo}"
${pedidoActivo ? "" : "disabled"}>
Agregar al carrito
</button>


        </div>
        `;

    });

    contenedor.innerHTML = html;
    agregarEventos();

}
function agregarEventos(){

    document.querySelectorAll(".btnAgregar").forEach(boton=>{

        boton.addEventListener("click",()=>{

            agregarProducto(boton.dataset.codigo);

        });

    });

}
function agregarProducto(Codigo){

    fetch("../index/carrito.php",{

        method:"POST",

        headers:{
            "Content-Type":"application/x-www-form-urlencoded"
        },

        body:"accion=agregar&codigo="+Codigo

    })

    .then(respuesta => respuesta.json())

.then(datos=>{

    console.log(datos);

    if(datos.ok){

        actualizarCarrito();

    }else{

        alert(datos.mensaje);

    }

})
}
function habilitarCompra(){

    pedidoActivo = true;

    document.querySelectorAll(".btnAgregar")
    .forEach(boton=>{

        boton.disabled = false;

    });

}

function verificarPedido(){

    fetch("../index/verificar_pedido.php")

    .then(res => res.json())

    .then(datos => {

        console.log("Pedido:",datos);

        if(datos.pedidoActivo){

            pedidoActivo = true;

        }

        cargarProductos();

    });

}