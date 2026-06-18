<style>

    header{
        grid-area:header;

background-image: url("imagenes/cabeceraorg.png");

        background-size:cover;
        background-repeat:no-repeat;
        background-position:center;

        display:flex;
        justify-content:center;
        align-items:center;

        min-height:350px;

        border-bottom:5px solid #E64B6B;
    }
header img{
    animation:aparecer 1.5s ease;
}

#g{
    scale:0.5;
}

@keyframes aparecer{

    from{
        opacity:0;
        transform:scale(0.7);
    }

    to{
        opacity:1;
        transform:scale(1);
    }

}

    @media(max-width:1200px){

        header{
            min-height:300px;
        }

        #g{
            width:90%;
            scale:1;
        }

    }

</style>

<header>
    <img src="imagenes/MYMS 4 SIN FONDO.png" id="g" alt="M&M's">
</header>