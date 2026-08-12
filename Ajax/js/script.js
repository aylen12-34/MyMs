//no funciona aun

function buscarProducto(){

/*envia  le dice javascript,ve al servidor y pide este archivo, el navegador llama a php sin recargar la pagina*/
fetch("Productos/productos.php")

/*recibe la respuesta en datos y json lo transforma a un objeto en javascript antes nombre:mouse despues producto.nombre*/
.then(respuesta => respuesta.json())


.then(datos => {

/*crea una variable vacia en html donde guardamos los datos obtenidos en html*/
let html="";

/*recorre el arreglo. producto es simplemente el nombre de una variable que tú eliges.es como la variable donde s guarda informacion del objeto*/
datos.forEach(productos => {
/*JavaScript usa las variables para rellenar el HTML con datos dinámicos, en lugar de escribir esos valores manualmente en el archivo HTML. Esto permite mostrar información que llega desde una base de datos*/ 

html += `

<h3>${productos.Nombre}</h3>
<img src="img/productos/${productos.imagen}" width="100">

<p>
Descripción: ${productos.Descripcion}
</p>

<p>
Precio: Bs ${productos.Precio}
</p>

<p>
Stock: ${productos.Stock}
</p>

<hr>

`;


});

/*aqui le estamos diciendo que todo lo anterior lo pongamos en el div que se llama resultado con su id*/
document.getElementById("resultado")
.innerHTML = html;


});


}