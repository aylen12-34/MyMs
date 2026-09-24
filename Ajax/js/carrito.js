//==============================
// ABRIR CARRITO
//==============================

document.getElementById("carritoIcono")
.addEventListener("click", () => {

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
.addEventListener("click", cerrarSidebar);

document.getElementById("fondo")
.addEventListener("click", cerrarSidebar);


function cerrarSidebar() {

    document.getElementById("sidebar")
    .classList.remove("activo");

    document.getElementById("fondo")
    .classList.remove("activo");

}


//==============================
// ACTUALIZAR CARRITO
//==============================

function actualizarCarrito() {

    fetch("../index/carrito.php", {

        method: "POST",

        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },

        body: "accion=mostrar"

    })

    .then(res => res.json())

    .then(datos => {

        console.log(datos);


        let total = 0;

        let cantidadTotal = 0;


        const contenidoCarrito =
            document.getElementById("contenidoCarrito");


        // Limpiar contenido anterior
        contenidoCarrito.replaceChildren();


        datos.forEach(producto => {


            //==============================
            // CONVERTIR DATOS NUMÉRICOS
            //==============================

            let subtotal = Number(producto.CostoTotal);

            let cantidad = Number(producto.Cantidad);

            let precio = Number(producto.Precio);


            // Evitar valores numéricos inválidos

            if (!Number.isFinite(subtotal)) {
                subtotal = 0;
            }

            if (!Number.isFinite(cantidad)) {
                cantidad = 0;
            }

            if (!Number.isFinite(precio)) {
                precio = 0;
            }


            total += subtotal;

            cantidadTotal += cantidad;


            //==============================
            // CREAR CONTENEDOR
            //==============================

            const divProducto =
                document.createElement("div");

            divProducto.className = "productoCarrito";


            //==============================
            // IMAGEN
            //==============================

            const imagen =
                document.createElement("img");

            /*
             * La ruta de la imagen viene de la base de datos.
             *
             * Se mantiene el funcionamiento actual.
             */

            imagen.src = "../../" + String(producto.imagen || "");

            imagen.width = 80;

            imagen.alt = "Producto";


            //==============================
            // NOMBRE
            //==============================

            const nombre =
                document.createElement("h3");

            /*
             * IMPORTANTE:
             * textContent trata el contenido como texto.
             *
             * Si el nombre fuera:
             *
             * <script>alert("XSS")</script>
             *
             * se mostraría como texto y NO se ejecutaría.
             */

            nombre.textContent =
                String(producto.Nombre || "");


            //==============================
            // PRECIO
            //==============================

            const precioTexto =
                document.createElement("p");

            precioTexto.textContent =
                "Precio: Bs " + precio;


            //==============================
            // CANTIDAD
            //==============================

            const cantidadTexto =
                document.createElement("p");

            cantidadTexto.textContent =
                "Cantidad: " + cantidad;


            //==============================
            // SUBTOTAL
            //==============================

            const subtotalTexto =
                document.createElement("p");

            subtotalTexto.textContent =
                "Subtotal: Bs " + subtotal;


            //==============================
            // ARMAR PRODUCTO
            //==============================

            divProducto.appendChild(imagen);

            divProducto.appendChild(nombre);

            divProducto.appendChild(precioTexto);

            divProducto.appendChild(cantidadTexto);

            divProducto.appendChild(subtotalTexto);


            contenidoCarrito.appendChild(divProducto);

        });


        //==============================
        // ACTUALIZAR CANTIDAD
        //==============================

        document.getElementById("cantidadCarrito")
        .textContent = cantidadTotal;


        //==============================
        // ACTUALIZAR TOTAL
        //==============================

        document.getElementById("totalCarrito")
        .textContent = "Total: Bs " + total;


    })

    .catch(error => {

        console.log("Error carrito:", error);

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

                    "Content-Type":
                        "application/x-www-form-urlencoded"

                },

                body: "accion=vaciar"

            })


            .then(res => res.json())


            .then(datos => {


                if (datos.ok) {


                    Swal.fire({

                        title: "¡Vaciado!",

                        text: datos.mensaje,

                        imageUrl:
                            '../../imagenes/gatocarrito.png',

                        imageHeight: 150,

                        imageAlt:
                            'Icono personalizado',

                        confirmButtonColor:
                            "#6A253A"

                    });


                    actualizarCarrito();


                } else {


                    Swal.fire({

                        title: "Error",

                        text: datos.mensaje,

                        imageUrl:
                            '../../imagenes/gatocarrito.png',

                        imageHeight: 150,

                        imageAlt:
                            'Icono personalizado',

                        confirmButtonColor:
                            "#6A253A"

                    });

                }


            })


            .catch(error => {


                console.log(
                    "Error al vaciar carrito:",
                    error
                );


                Swal.fire({

                    title: "Error",

                    text:
                        "Hubo un problema al conectar con el servidor.",

                    imageUrl:
                        '../../imagenes/gatocarrito.png',

                    imageHeight: 150,

                    imageAlt:
                        'Icono personalizado',

                    confirmButtonColor:
                        "#6A253A"

                });

            });

        }

    });

}


//==============================
// COMPRAR
//==============================

document.addEventListener("click", function(e) {


    if (e.target.id == "comprar") {


        fetch("finalizar_pedido.php")

        .then(res => res.json())

        .then(data => {


            if (data.ok) {


                window.location.href =
                    "recibo.php";


            } else {


                alert(data.mensaje);

            }


        })

        .catch(error => {

            console.log(
                "Error al finalizar pedido:",
                error
            );

        });

    }

});