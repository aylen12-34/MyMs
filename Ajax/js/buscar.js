function buscarProducto(){

    var nombre =document.getElementById("textoBuscar").value;

    fetch("buscar_producto.php?nombre="+nombre)

    .then(res=>res.json())

    .then(data=>{

        console.log(data);

        var html="";

        data.forEach(producto=>{

            html += `
            <div class="tarjeta">
            <img src="../../${producto.imagen}" alt="${producto.Nombre}" width="100px">

            <h3>${producto.Nombre}</h3>

            <p>${producto.Descripcion}</p>

           <a href="../index/produc.php?Codigo=${producto.Codigo}"><button > Mas informacion</button></a>

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

        document.getElementById("productos").innerHTML = html;

    });

}