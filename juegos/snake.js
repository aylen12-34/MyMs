
const canvas = document.getElementById("tablero");
const ctx = canvas.getContext("2d");

const puntuacionElemento = document.getElementById("puntuacion");
const pantallaFinal = document.getElementById("pantallaFinal");
const puntuacionFinal = document.getElementById("puntuacionFinal");
const botonReiniciar = document.getElementById("reiniciar");

const TAMANO_CELDA = 24;
const COLUMNAS = canvas.width / TAMANO_CELDA;
const FILAS = canvas.height / TAMANO_CELDA;
const VELOCIDAD = 120;

const COLORES = {
    crema: "#FFF8F4",
    cremaOscuro: "#EFE2DA",
    vino: "#6A253A",
    vinoOscuro: "#4F1B2C",
    rosa: "#E64B6B"
};

let serpiente;
let serpienteAnterior;
let direccion;
let siguienteDireccion;
let galletas;
let puntuacion;
let intervalo;
let terminado;
let ultimoPaso = 0;

function iniciarJuego() {
    clearInterval(intervalo);

    serpiente = [
        { x: 10, y: 10 },
        { x: 9, y: 10 },
        { x: 8, y: 10 }
    ];

    serpienteAnterior = serpiente.map(s => ({ ...s }));

    direccion = { x: 1, y: 0 };
    siguienteDireccion = { x: 1, y: 0 };

    galletas = [];
    puntuacion = 0;
    terminado = false;

    puntuacionElemento.textContent = puntuacion;
    pantallaFinal.hidden = true;

    colocarGalleta();
    colocarGalleta();

    ultimoPaso = performance.now();
    dibujar();

    intervalo = setInterval(actualizar, VELOCIDAD);
}

function colocarGalleta() {
    const libres = [];

    for (let y = 0; y < FILAS; y++) {
        for (let x = 0; x < COLUMNAS; x++) {
            const ocupadaPorSerpiente = serpiente.some(
                s => s.x === x && s.y === y
            );

            const ocupadaPorGalleta = galletas.some(
                g => g.x === x && g.y === y
            );

            if (!ocupadaPorSerpiente && !ocupadaPorGalleta) {
                libres.push({ x, y });
            }
        }
    }

    if (libres.length === 0) return false;

    const indice = Math.floor(Math.random() * libres.length);
    galletas.push(libres[indice]);

    return true;
}

function actualizar() {
    if (terminado) return;

    // Guardamos la posición anterior para animar el desplazamiento.
    serpienteAnterior = serpiente.map(s => ({ ...s }));

    direccion = { ...siguienteDireccion };

    const cabeza = {
        x: serpiente[0].x + direccion.x,
        y: serpiente[0].y + direccion.y
    };

    const fueraDelTablero =
        cabeza.x < 0 ||
        cabeza.x >= COLUMNAS ||
        cabeza.y < 0 ||
        cabeza.y >= FILAS;

    if (fueraDelTablero) {
        finalizarJuego();
        return;
    }

    const indiceGalleta = galletas.findIndex(
        g => g.x === cabeza.x && g.y === cabeza.y
    );

    const comiendo = indiceGalleta !== -1;

    // La cola deja libre su casilla cuando la serpiente no come.
    const cuerpo = comiendo
        ? serpiente
        : serpiente.slice(0, -1);

    const chocaConCuerpo = cuerpo.some(
        s => s.x === cabeza.x && s.y === cabeza.y
    );

    if (chocaConCuerpo) {
        finalizarJuego();
        return;
    }

    serpiente.unshift(cabeza);

    if (comiendo) {
        galletas.splice(indiceGalleta, 1);

        puntuacion++;
        puntuacionElemento.textContent = puntuacion;

        colocarGalleta();

        if (galletas.length === 0) {
            finalizarJuego(true);
            return;
        }
    } else {
        serpiente.pop();
    }

    ultimoPaso = performance.now();
    dibujar();
}

function dibujarTablero() {
    for (let y = 0; y < FILAS; y++) {
        for (let x = 0; x < COLUMNAS; x++) {
            ctx.fillStyle = (x + y) % 2 === 0
                ? COLORES.crema
                : COLORES.cremaOscuro;

            ctx.fillRect(
                x * TAMANO_CELDA,
                y * TAMANO_CELDA,
                TAMANO_CELDA,
                TAMANO_CELDA
            );
        }
    }

    // Cuadrícula sutil.
    ctx.strokeStyle = "#6A253A12";
    ctx.lineWidth = 1;
    ctx.beginPath();

    for (let x = 0; x <= COLUMNAS; x++) {
        ctx.moveTo(x * TAMANO_CELDA, 0);
        ctx.lineTo(x * TAMANO_CELDA, canvas.height);
    }

    for (let y = 0; y <= FILAS; y++) {
        ctx.moveTo(0, y * TAMANO_CELDA);
        ctx.lineTo(canvas.width, y * TAMANO_CELDA);
    }

    ctx.stroke();
}

function dibujarGalleta(galleta) {
    const x = galleta.x * TAMANO_CELDA + TAMANO_CELDA / 2;
    const y = galleta.y * TAMANO_CELDA + TAMANO_CELDA / 2;

    ctx.save();

    // Sombra suave.
    ctx.shadowColor = "#4F1B2C45";
    ctx.shadowBlur = 5;
    ctx.shadowOffsetY = 2;

    // Galleta dorada.
    ctx.beginPath();
    ctx.arc(x, y, 8.5, 0, Math.PI * 2);
    ctx.fillStyle = "#DCA66C";
    ctx.fill();

    ctx.shadowColor = "transparent";
    ctx.lineWidth = 1.5;
    ctx.strokeStyle = "#A96D43";
    ctx.stroke();

    // Pequeño brillo.
    ctx.beginPath();
    ctx.arc(x - 2.5, y - 3, 2, 0, Math.PI * 2);
    ctx.fillStyle = "#F8D9A8";
    ctx.fill();

    // Chispas de chocolate.
    ctx.fillStyle = COLORES.vinoOscuro;

    [
        [-3, -2],
        [3, -3],
        [2, 3],
        [-4, 3]
    ].forEach(([dx, dy]) => {
        ctx.beginPath();
        ctx.arc(x + dx, y + dy, 1.3, 0, Math.PI * 2);
        ctx.fill();
    });

    ctx.restore();
}

function dibujarSerpiente(progreso = 1) {
    serpiente.forEach((segmento, indice) => {
        const anterior = indice === 0
            ? serpienteAnterior[0]
            : (serpienteAnterior[indice] || serpienteAnterior.at(-1));

        const xCelda = anterior.x +
            (segmento.x - anterior.x) * progreso;

        const yCelda = anterior.y +
            (segmento.y - anterior.y) * progreso;

        const margen = indice === 0 ? 2 : 3;
        const x = xCelda * TAMANO_CELDA + margen;
        const y = yCelda * TAMANO_CELDA + margen;
        const tamano = TAMANO_CELDA - margen * 2;

        ctx.save();

        // Sombra ligera para dar profundidad.
        ctx.shadowColor = "#4F1B2C30";
        ctx.shadowBlur = indice === 0 ? 5 : 3;
        ctx.shadowOffsetY = 2;

        const degradado = ctx.createLinearGradient(
            x, y, x + tamano, y + tamano
        );

        if (indice === 0) {
            degradado.addColorStop(0, COLORES.vino);
            degradado.addColorStop(1, COLORES.vinoOscuro);
        } else {
            degradado.addColorStop(0, "#87364E");
            degradado.addColorStop(1, COLORES.vino);
        }

        ctx.beginPath();
        ctx.roundRect(x, y, tamano, tamano, 7);
        ctx.fillStyle = degradado;
        ctx.fill();

        ctx.shadowColor = "transparent";

        // Brillo discreto en cada segmento.
        ctx.beginPath();
        ctx.roundRect(x + 3, y + 3, tamano - 6, 2, 1);
        ctx.fillStyle = "#FFFFFF25";
        ctx.fill();

        // Ojos de la cabeza.
        if (indice === 0) {
            const centroX = x + tamano / 2;
            const centroY = y + tamano / 2;

            let ojos;

            if (direccion.x === 1) {
                ojos = [
                    [x + tamano - 5, y + 5],
                    [x + tamano - 5, y + tamano - 5]
                ];
            } else if (direccion.x === -1) {
                ojos = [
                    [x + 5, y + 5],
                    [x + 5, y + tamano - 5]
                ];
            } else if (direccion.y === -1) {
                ojos = [
                    [x + 5, y + 5],
                    [x + tamano - 5, y + 5]
                ];
            } else {
                ojos = [
                    [x + 5, y + tamano - 5],
                    [x + tamano - 5, y + tamano - 5]
                ];
            }

            ojos.forEach(([ox, oy]) => {
                ctx.beginPath();
                ctx.arc(ox, oy, 2.3, 0, Math.PI * 2);
                ctx.fillStyle = COLORES.crema;
                ctx.fill();

                ctx.beginPath();
                ctx.arc(ox, oy, 1, 0, Math.PI * 2);
                ctx.fillStyle = COLORES.rosa;
                ctx.fill();
            });
        }

        ctx.restore();
    });
}

function dibujar() {
    dibujarTablero();

    galletas.forEach(dibujarGalleta);

    const ahora = performance.now();
    const progreso = terminado
        ? 1
        : Math.min(1, (ahora - ultimoPaso) / VELOCIDAD);

    dibujarSerpiente(progreso);
}

function animar() {
    dibujar();
    requestAnimationFrame(animar);
}

function finalizarJuego(victoria = false) {
    terminado = true;
    clearInterval(intervalo);

    puntuacionFinal.textContent = puntuacion;

    const titulo = pantallaFinal.querySelector("h2");

    titulo.textContent = victoria
        ? "¡Tablero completado!"
        : "¡Fin de la partida!";

    pantallaFinal.hidden = false;
}

document.addEventListener("keydown", function(evento) {
    const teclas = [
        "ArrowUp",
        "ArrowDown",
        "ArrowLeft",
        "ArrowRight"
    ];

    if (teclas.includes(evento.key)) {
        evento.preventDefault();
    }

    if (terminado) return;

    let nuevaDireccion;

    switch (evento.key) {
        case "ArrowUp":
            nuevaDireccion = { x: 0, y: -1 };
            break;
        case "ArrowDown":
            nuevaDireccion = { x: 0, y: 1 };
            break;
        case "ArrowLeft":
            nuevaDireccion = { x: -1, y: 0 };
            break;
        case "ArrowRight":
            nuevaDireccion = { x: 1, y: 0 };
            break;
        default:
            return;
    }

    const giroContrario =
        nuevaDireccion.x === -direccion.x &&
        nuevaDireccion.y === -direccion.y;

    if (!giroContrario) {
        siguienteDireccion = nuevaDireccion;
    }
});

botonReiniciar.addEventListener("click", iniciarJuego);

iniciarJuego();
requestAnimationFrame(animar);
