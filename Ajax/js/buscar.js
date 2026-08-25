function buscarProducto(){

    var nombre =document.getElementById("textoBuscar").value;

    fetch("buscar_producto.php?nombre="+nombre)

    .then(res=>res.json())

    .then(data=>{

        console.log(data);

        var html="";

        data.forEach(producto=>{

            html += `

            <h3>${producto.nombre}</h3>

            <p>
            Precio: Bs ${producto.precio}
            </p>

            <hr>

            `;

        });

        document.getElementById("productos").innerHTML = html;

    });

}