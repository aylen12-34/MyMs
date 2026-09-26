
function buscarProducto(){
fetch("../../Productos/productos.php")
.then(respuesta => respuesta.json())


.then(datos => {

let html="";
datos.forEach(productos => {

html += `
<section class="tarjeta">
    <h3 class="tarjeta-h3">${productos.Nombre}</h3>
    <img src="../../imagenes/galletas/${productos.imagen}" width="100">

<p class="tarjeta-p">
Descripción: ${productos.Descripcion}
</p>

<p class="tarjeta-p">
Precio: Bs ${productos.Precio}
</p>

<p class="tarjeta-p">
Stock: ${productos.Stock}
</p>
</section>



`;


});

/*aqui le estamos diciendo que todo lo anterior lo pongamos en el div que se llama resultado con su id*/
document.getElementById("resultado")
.innerHTML = html;


});


}