document.addEventListener("DOMContentLoaded",()=>{

verificarEstadoPedido();

});


//==============================
// ABRIR FORMULARIO
//==============================


document.getElementById("generarPedido").addEventListener("click",()=>{

    document
    .getElementById("modalCompra")
    .style.display="flex";

});

//==============================
// CERRAR FORMULARIO
//==============================

document.getElementById("cancelarCompra").addEventListener("click",()=>{

    document.getElementById("modalCompra")
    .style.display="none";

});
//==============================
// CONFIRMAR COMPRA
//==============================
document.getElementById("confirmarPedido").addEventListener("click",()=>{
      

    let datos = {

        Nombre: document.getElementById("Nombre").value,
        Celular: document.getElementById("Celular").value,
        Direccion: document.getElementById("Direccion").value,
        Metodo: document.getElementById("Metodo").value,
    

    };



fetch("../index/crearpedido.php",{

    method:"POST",

    headers:{
        "Content-Type":"application/json"
    },

    body: JSON.stringify(datos)

})


.then(res=>res.json())


.then(data=>{


    console.log(data);


    if(data.ok){
document.getElementById("modalCompra").style.display = "none";
Swal.fire({
        title: 'Pedido N'+ data.pedidos,
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../../imagenes/chimuelo.jpeg', // Ruta a tu imagen o icono
        imageHeight: 200,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: 'Gracias por tu compra'
    }).then((result) => {
                // La redirección solo se ejecuta cuando el usuario hace clic en "OK"
                if (result.isConfirmed) {
                    window.location.href = "index1.php?ID=" + data.pedidos;
                }
            });
    }else{


        alert(data.mensaje);


    }


})


.catch(error=>{

    console.log("Error:",error);

});


});
function verificarEstadoPedido(){


fetch("estadopedido.php")


.then(res=>res.json())


.then(data=>{


if(data.ok){


let pedido=data.pedido;



if(pedido.Estado=="Pendiente"){



document.getElementById("formularioPedido").style.display="none";



document.getElementById("resumenPedido").style.display="block";



document.getElementById("datosPedido").innerHTML=`
<p>
Número pedido:
${pedido.id}
</p>


<p>
Cliente:
${pedido.Nombre}
</p>


<p>
Teléfono:
${pedido.telefono}
</p>


<p>
Dirección:
${pedido.direccion}
</p>


<p>
Método pago:
${pedido.metodoPago}
</p>


<p>
Estado:
Pendiente de aprobación
</p>


`;



}


}



});


}