function buscarProducto(){

    var nombre =document.getElementById("textoBuscar").value;

    fetch("buscar_producto.php?Nombre="+nombre)

    .then(res=>res.json())

    .then(data=>{

        console.log(data);

        var html="";

        data.forEach(producto=>{

            html += `

            <h3>${producto.Nombre}</h3>

            <p>
            Precio: Bs ${producto.Precio}
            </p>

            <hr>

            `;

        });

        document.getElementById("productos").innerHTML = html;

    });

}