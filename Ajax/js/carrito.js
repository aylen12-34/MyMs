//==============================
// ABRIR CARRITO
//==============================

document.getElementById("carritoIcono")
.addEventListener("click",()=>{

    document.getElementById("sidebar")
    .classList.add("activo");

    document.getElementById("fondo")
    .classList.add("activo");

    actualizarCarrito();

});

//==============================
// CERRAR
//==============================

document.getElementById("cerrarCarrito")
.addEventListener("click",cerrarSidebar);

document.getElementById("fondo")
.addEventListener("click",cerrarSidebar);

function cerrarSidebar(){

    document.getElementById("sidebar")
    .classList.remove("activo");

    document.getElementById("fondo")
    .classList.remove("activo");

}

//==============================
// ACTUALIZAR CARRITO
//==============================


function actualizarCarrito(){

fetch("../index/carrito.php",{

method:"POST",

headers:{
"Content-Type":"application/x-www-form-urlencoded"
},

body:"accion=mostrar"

})

.then(res=>res.json())

.then(datos=>{


console.log(datos);


let html="";

let total = 0;

let cantidadTotal = 0;


datos.forEach(producto=>{


let subtotal = Number(producto.CostoTotal);

let cantidad = Number(producto.Cantidad);


total += subtotal;

cantidadTotal += cantidad;


html += `

<div class="productoCarrito">

<img src="../../${producto.imagen}" width="80">


<h3>
${producto.Nombre}
</h3>


<p>
Precio: Bs ${producto.Precio}
</p>


<p>
Cantidad: ${cantidad}
</p>


<p>
Subtotal:
Bs ${subtotal}
</p>


</div>

`;

});


document.getElementById("contenidoCarrito")
.innerHTML = html;



document.getElementById("cantidadCarrito")
.innerHTML = cantidadTotal;



document.getElementById("totalCarrito")
.innerHTML = "Total: Bs " + total;



})

.catch(error=>{

console.log("Error carrito:",error);

});


}
//==============================
// VACIAR CARRITO
//==============================

document.getElementById("vaciarCarrito")
.addEventListener("click", vaciarCarrito);

function vaciarCarrito() {
    Swal.fire({
        title: "¿Desea vaciar todo el carrito?",
        text: "Esta acción no se puede deshacer.",
        imageUrl: '../../imagenes/gatocarrito.png', 
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        showCancelButton: true,
        confirmButtonColor: "#E64B6B",
        cancelButtonColor: "#6A253A",
        confirmButtonText: "Sí, vaciar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            fetch("../index/carrito.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "accion=vaciar"
            })
            .then(res => res.json())
            .then(datos => {
                if (datos.ok) {
                    Swal.fire({
                        title: "¡Vaciado!",
                        text: datos.mensaje,
                        imageUrl: '../../imagenes/gatocarrito.png',
                        imageHeight: 150,
                        imageAlt: 'Icono personalizado',
                        confirmButtonColor: "#6A253A"
                    });
                    actualizarCarrito();
                } else {
                    Swal.fire({
                        title: "Error",
                        text: datos.mensaje,
                        imageUrl: '../../imagenes/gatocarrito.png',
                        imageHeight: 150,
                        imageAlt: 'Icono personalizado',
                        confirmButtonColor: "#6A253A"
                    });
                }
            })
            .catch(error => {
                console.log("Error al vaciar carrito:", error);
                Swal.fire({
                    title: "Error",
                    text: "Hubo un problema al conectar con el servidor.",
                    imageUrl: '../../imagenes/gatocarrito.png',
                    imageHeight: 150,
                    imageAlt: 'Icono personalizado',
                    confirmButtonColor: "#6A253A"
                });
            });
        }
    });
}

document.addEventListener("click",function(e){


    if(e.target.id=="comprar"){


        fetch("finalizar_pedido.php")

.then(res=>res.json())

.then(data=>{


    if(data.ok){


        window.location.href="recibo.php";


    }else{


        alert(data.mensaje);

    }


});

    }


});
