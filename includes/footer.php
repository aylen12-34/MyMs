<style>

footer {
    position: relative;

    width: 100%;

    background-image: url("imagenes/pie.png");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;

    color: #EFE2DA;

    border-top: 5px solid #E64B6B;

    padding: 30px 8% 18px;

    box-sizing: border-box;
}

footer::before {
    content: "";

    position: absolute;

    top: 0;
    left: 0;
    right: 0;
    bottom: 0;

    background: rgba(45, 10, 25, 0.48);

    z-index: 0;
}

.footer-contenido {
    position: relative;
    z-index: 1;

    width: 100%;
    max-width: 1200px;

    margin: 0 auto;

    box-sizing: border-box;
}

.footer-columnas {
    display: flex;

    justify-content: space-between;
    align-items: flex-start;

    gap: 50px;

    width: 100%;
}

.footer-marca {
    flex: 1;
}

.footer-marca h2 {
    margin: 0 0 8px;

    font-family: 'Chillax', sans-serif;

    font-size: 32px;
    font-weight: 600;

    color: #EFE2DA;
}

.footer-marca p {
    margin: 0;

    font-family: 'Chillax', sans-serif;

    font-size: 15px;

    line-height: 1.5;

    color: #f5e9e4;
}

.footer-columna {
    flex: 1;
}

.footer-columna h3 {
    margin: 0 0 12px;

    font-family: 'Chillax', sans-serif;

    font-size: 18px;
    font-weight: 600;

    color: #E64B6B;
}

.footer-columna p {
    margin: 7px 0;

    font-family: 'Chillax', sans-serif;

    font-size: 14px;

    line-height: 1.5;

    color: #EFE2DA;
}

.footer-columna p i {
    margin-right: 7px;

    color: #E64B6B;
}


.footer-red {
    display: flex;

    align-items: center;

    gap: 10px;

    margin: 9px 0;

    color: #EFE2DA;

    text-decoration: none;

    font-family: 'Chillax', sans-serif;

    font-size: 14px;

    transition: 0.3s ease;
}

.footer-red:hover {
    color: #E64B6B;
}

.footer-red i {
    width: 22px;

    text-align: center;

    font-size: 18px;
}

.footer-bottom {
    margin-top: 22px;

    padding-top: 12px;

    border-top: 1px solid rgba(239, 226, 218, 0.35);

    text-align: center;
}

.footer-bottom p {
    margin: 0;

    font-family: 'Chillax', sans-serif;

    font-size: 12px;

    color: rgba(239, 226, 218, 0.85);
}

@media (max-width: 700px) {

    footer {
        padding: 28px 25px 16px;
    }

    .footer-columnas {
        flex-direction: column;

        align-items: center;

        text-align: center;

        gap: 20px;
    }

    .footer-marca,
    .footer-columna {
        width: 100%;
    }

    .footer-marca h2 {
        font-size: 27px;
    }

    .footer-red {
        justify-content: center;
    }

    .footer-bottom {
        margin-top: 18px;
    }
}

</style>

<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
>


<footer>

    <div class="footer-contenido">

        <div class="footer-columnas">

            <div class="footer-marca">

                <h2>MyMs</h2>

                <p>
                    Sabor que se adapta a ti.
                </p>

            </div>


            <div class="footer-columna">

                <h3>Contacto</h3>

                <p>
                    <i class="fa-solid fa-location-dot"></i>
                    Plazuela Tarija, entre Av. América
                    y Gral. Galindo, Cochabamba
                </p>

                <p>
                    <i class="fa-brands fa-whatsapp"></i>
                    +591 69505739
                </p>

            </div>


            <div class="footer-columna">

                <h3>Síguenos</h3>

                <a href="#" class="footer-red">

                    <i class="fa-brands fa-instagram"></i>

                    <span>
                        myms.ssweetstudio
                    </span>

                </a>

                <a href="#" class="footer-red">

                    <i class="fa-brands fa-whatsapp"></i>

                    <span>
                        WhatsApp
                    </span>

                </a>

            </div>

        </div>


        <div class="footer-bottom">

            <p>
                &copy; 2026 MyMs. Todos los derechos reservados.
            </p>

        </div>

    </div>

</footer>