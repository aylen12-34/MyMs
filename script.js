//no funciona aun

function buscarProducto(){

/*envia  le dice javascript,ve al servidor y pide este archivo, el navegador llama a php sin recargar la pagina*/
fetch("productos.php")

/*recibe la respuesta en datos y json lo transforma a un objeto en javascript antes nombre:mouse despues producto.nombre*/
.then(respuesta => respuesta.json())


.then(datos => {

/*crea una variable vacia en html donde guardamos los datos obtenidos en html*/
var resu="";

/*recorre el arreglo. producto es simplemente el nombre de una variable que tú eliges.es como la variable donde s guarda informacion del objeto*/
datos.forEach(producto => {
/*JavaScript usa las variables para rellenar el HTML con datos dinámicos, en lugar de escribir esos valores manualmente en el archivo HTML. Esto permite mostrar información que llega desde una base de datos*/ 

resu =resu+ `

<h3>${producto.nombre}</h3>
<img src="img/img/productos/${producto.imagen}" width="100">

<p>
Descripción: ${producto.descripcion}
</p>


<p>
Stock: ${producto.stock}
</p>

<hr>

`;


});

/*aqui le estamos diciendo que todo lo anterior lo pongamos en el div que se llama resultado con su id*/
document.getElementById("resultado")
.innerHTML = resu;


});


}