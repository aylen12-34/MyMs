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
                <img src="../../${producto.imagen}" alt="${producto.Nombre}">
                
                <div class="infoDetalle">
                    <h3>${producto.Nombre}</h3>
                    
                    <div class="precioDescripcion">
                        <h2>Bs ${producto.Precio}</h2>
                        <p>${producto.Descripcion}</p>
                        <p>${producto.Detallado}</p>
                    </div>
                </div>
            </div>
            `;

        });

        document.getElementById("productosbusqueda").innerHTML = html;

    });

}