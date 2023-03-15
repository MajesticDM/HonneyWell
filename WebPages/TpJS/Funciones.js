function EliminarYEnviar() {
    window.alert("Informacion enviada");
    document.getElementById("No").value = "";
    document.getElementById("Ci").value = "";
    document.getElementById("Di").value = "";
    document.getElementById("Te").value = "";
    document.getElementById("Ma").value = "";
    document.getElementById("Ge").value = "";
    document.getElementById("Su").value = "";
}

function Eliminar() {
    document.getElementById("Ge").value = "";
    document.getElementById("No").value = "";
    document.getElementById("Ci").value = "";
    document.getElementById("Di").value = "";
    document.getElementById("Te").value = "";
    document.getElementById("Ma").value = "";
    document.getElementById("Su").value = "";
}

function facebook() {
    location.href = 'https://www.facebook.com/MajesticDM';
}

function twitter() {
    location.href = 'https://twitter.com/?lang=es';
}

function instagram() {
    location.href = 'https://www.instagram.com/';
}

function github() {
    location.href = 'https://github.com/MajesticDM';
}

function linkedin() {
    location.href = 'https://co.linkedin.com/in/dev-team-47b900238?trk=people-guest_people_search-card';
}

$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
});
var TotalVentaAcobrar
document.addEventListener('DOMContentLoaded', () => {

    // Variables
    const baseDeDatos = [
        {
            id: 1,
            nombre: 'Traje de seguridad',
            precio: 250000,
            imagen: '../Images/trajeP1.jpg'
        },
        {
            id: 2,
            nombre: 'Traje de seguridad americano',
            precio: 540000,
            imagen: '../Images/trajeP2.jpg'
        },
        {
            id: 3,
            nombre: 'Traje de seguridad europeo',
            precio: 850000,
            imagen: '../Images/trajeP3.jpg'
        },
        {
            id: 4,
            nombre: 'Traje de seguridad económico',
            precio: 210000,
            imagen: '../Images/trajeP4.jpg'
        },
        {
            id: 5,
            nombre: 'Vaporizador MK2',
            precio: 1200000,
            imagen: '../Images/VaporizaP1.jpg'
        },
        {
            id: 6,
            nombre: 'Casa para abejas nueva',
            precio: 710000,
            imagen: '../Images/casasabejas.png'
        },
        {
            id: 7,
            nombre: 'Herramientas avanzadas',
            precio: 450000,
            imagen: '../Images/Herramientas1.png'
        },
        {
            id: 8,
            nombre: 'Herramientas básicas',
            precio: 219000,
            imagen: '../Images/Herramientas2.png'
        },
        {
            id: 9,
            nombre: 'Traje AQK12',
            precio: 1400000,
            imagen: '../Images/trajeP1.jpg'
        },
        {
            id: 10,
            nombre: 'Traje americano',
            precio: 1000000,
            imagen: '../Images/trajeP2.jpg'
        },
        {
            id: 11,
            nombre: 'Traje B11',
            precio: 450000,
            imagen: '../Images/trajeP3.jpg'
        },
        {
            id: 12,
            nombre: 'Traje europeo',
            precio: 1200000,
            imagen: '../Images/trajeP4.jpg'
        },
        {
            id: 13,
            nombre: 'Vaporizador económico',
            precio: 450000,
            imagen: '../Images/VaporizaP1.jpg'
        }

    ];

    let carrito = [];
    const divisa = '$';
    const DOMitems = document.querySelector('#items');
    const DOMcarrito = document.querySelector('#carrito');
    const DOMtotal = document.querySelector('#total');
    const DOMbotonVaciar = document.querySelector('#boton-vaciar');
    const miLocalStorage = window.localStorage;

    // Funciones

    /**
    * Dibuja todos los productos a partir de la base de datos. No confundir con el carrito
    */
    function renderizarProductos() {
        baseDeDatos.forEach((info) => {
            // Estructura
            const miNodo = document.createElement('div');
            miNodo.classList.add('card', 'col-sm-4');
            // Body
            const miNodoCardBody = document.createElement('div');
            miNodoCardBody.classList.add('card-body');
            // Titulo
            const miNodoTitle = document.createElement('h5');
            miNodoTitle.classList.add('card-title');
            miNodoTitle.textContent = info.nombre;
            // Imagen
            const miNodoImagen = document.createElement('img');
            miNodoImagen.classList.add('img-fluid');
            miNodoImagen.setAttribute('src', info.imagen);
            // Precio
            const miNodoPrecio = document.createElement('p');
            miNodoPrecio.classList.add('card-text');
            miNodoPrecio.textContent = `${info.precio}${divisa}`;
            // Boton 
            const miNodoBoton = document.createElement('button');
            miNodoBoton.classList.add('btn', 'btn-primary');
            miNodoBoton.textContent = '+';
            miNodoBoton.setAttribute('marcador', info.id);
            miNodoBoton.addEventListener('click', anyadirProductoAlCarrito);
            // Insertamos
            miNodoCardBody.appendChild(miNodoImagen);
            miNodoCardBody.appendChild(miNodoTitle);
            miNodoCardBody.appendChild(miNodoPrecio);
            miNodoCardBody.appendChild(miNodoBoton);
            miNodo.appendChild(miNodoCardBody);
            DOMitems.appendChild(miNodo);
        });
    }

    /**
    * Evento para añadir un producto al carrito de la compra
    */
    function anyadirProductoAlCarrito(evento) {
        // Anyadimos el Nodo a nuestro carrito
        carrito.push(evento.target.getAttribute('marcador'))
        // Actualizamos el carrito 
        renderizarCarrito();
        // Actualizamos el LocalStorage
        guardarCarritoEnLocalStorage();
    }

    /**
    * Dibuja todos los productos guardados en el carrito
    */
    function renderizarCarrito() {
        // Vaciamos todo el html
        DOMcarrito.textContent = '';
        // Quitamos los duplicados
        const carritoSinDuplicados = [...new Set(carrito)];
        // Generamos los Nodos a partir de carrito
        carritoSinDuplicados.forEach((item) => {
            // Obtenemos el item que necesitamos de la variable base de datos
            const miItem = baseDeDatos.filter((itemBaseDatos) => {
                // ¿Coincide las id? Solo puede existir un caso
                return itemBaseDatos.id === parseInt(item);
            });
            // Cuenta el número de veces que se repite el producto
            const numeroUnidadesItem = carrito.reduce((total, itemId) => {
                // ¿Coincide las id? Incremento el contador, en caso contrario no mantengo
                return itemId === item ? total += 1 : total;
            }, 0);
            // Creamos el nodo del item del carrito
            const miNodo = document.createElement('li');
            miNodo.classList.add('list-group-item', 'text-right', 'mx-2');
            miNodo.textContent = `${numeroUnidadesItem} x ${miItem[0].nombre} - ${miItem[0].precio}${divisa}`;
            // Boton de borrar
            const miBoton = document.createElement('button');
            miBoton.classList.add('btn', 'btn-danger', 'mx-5');
            miBoton.textContent = 'X';
            miBoton.style.marginLeft = '1rem';
            miBoton.dataset.item = item;
            miBoton.addEventListener('click', borrarItemCarrito);
            // Mezclamos nodos
            miNodo.appendChild(miBoton);
            DOMcarrito.appendChild(miNodo);
        });
        // Renderizamos el precio total en el HTML
        DOMtotal.textContent = calcularTotal();
    }

    /**
    * Evento para borrar un elemento del carrito
    */
    function borrarItemCarrito(evento) {
        // Obtenemos el producto ID que hay en el boton pulsado
        const id = evento.target.dataset.item;
        // Borramos todos los productos
        carrito = carrito.filter((carritoId) => {
            return carritoId !== id;
        });
        // volvemos a renderizar
        renderizarCarrito();
        // Actualizamos el LocalStorage
        guardarCarritoEnLocalStorage();

    }

    /**
     * Calcula el precio total teniendo en cuenta los productos repetidos
     */

    function calcularTotal() {
        // Recorremos el array del carrito 
        return carrito.reduce((total, item) => {
            // De cada elemento obtenemos su precio
            const miItem = baseDeDatos.filter((itemBaseDatos) => {
                return itemBaseDatos.id === parseInt(item);
            });
            // Los sumamos al total

            return total + miItem[0].precio

        }, 0).toFixed(2);
    }

    /**
    * Varia el carrito y vuelve a dibujarlo
    */
    function vaciarCarrito() {
        // Limpiamos los productos guardados
        carrito = [];
        // Renderizamos los cambios
        renderizarCarrito();
        // Borra LocalStorage
        localStorage.clear();

    }

    function guardarCarritoEnLocalStorage() {
        miLocalStorage.setItem('carrito', JSON.stringify(carrito));
    }

    function cargarCarritoDeLocalStorage() {
        // ¿Existe un carrito previo guardado en LocalStorage?
        if (miLocalStorage.getItem('carrito') !== null) {
            // Carga la información
            carrito = JSON.parse(miLocalStorage.getItem('carrito'));
        }
    }

    // Eventos
    DOMbotonVaciar.addEventListener('click', vaciarCarrito);

    // Inicio
    cargarCarritoDeLocalStorage();
    renderizarProductos();
    renderizarCarrito();
    let TotalVentaAcobrar = total + miItem[0].precio
});

//Tarjeta de crédito

function toggle1() {
    var card = document.getElementById('cardT');
    card.classList.toggle("active");
}



function target1(a, b) {

    setTimeout(function () {

        var card = document.getElementById('cardT');
        var ct = card.getBoundingClientRect().top;
        var cl = card.getBoundingClientRect().left;

        var aa = document.getElementById(a);
        var ab = document.getElementById(b);

        var top1 = aa.getBoundingClientRect().top;
        var bottom1 = parseInt(window.getComputedStyle(aa).getPropertyValue("height"));
        var right1 = parseInt(window.getComputedStyle(aa).getPropertyValue("width"));
        var left1 = aa.getBoundingClientRect().left;

        ab.style.opacity = "1";

        ab.style.top = top1 - ct + "px";
        ab.style.left = left1 - cl + "px";
        ab.style.width = right1 + "px";
        ab.style.height = bottom1 + "px";

        if (a == "sdate") {
            ab.style.left = left1 - cl - 10 + "px";
            ab.style.width = right1 + 15 + "px";
        }

    }, 500);

}

function write1(a, b) {
    var mli = ["snum", "sname", "sdate", "sdate", "scvv"]
    var ab = b.value;

    if (a == 4) {
        var card = document.getElementById('cardT');
        card.classList.add("active");
        var ll = document.getElementById("pointer");
        ll.style.opacity = 0;
    } else {
        var card = document.getElementById('cardT');
        card.classList.remove("active");
        target1(mli[a], "pointer");

        if (a == 0) {
            star1(b);
        }
        if (a == 1) {
            full_n(b);
        }
        if (a == 2) {
            add_m(b);
        }
        if (a == 3) {
            add_y(b);
        }
    }
}

function star1(b) {
    var st1 = document.querySelectorAll(".label");
    var stfull = document.querySelectorAll(".stars1");
    var sb = b.value;

    if (sb.length <= 16) {

        for (var j = 0; j < st1.length; j++) {
            st1[j].innerHTML = "#";
            stfull[j].classList.remove("active");
        }

        for (var i = 0; i < sb.length; i++) {
            st1[i].innerHTML = sb[i];
            stfull[i].classList.add("active");
        }

    } else {
        b.value = sb.substring(0, 16);
    }
}

function add_m(b) {
    var mm = parseInt(b.value);
    var mm_set = document.getElementById("mm_set");
    var mm_cha = document.getElementById("cha_m");
    if (mm > 0 && mm < 13) {
        mm_set.classList.add("active");
        if (mm < 10) {
            mm = "0" + mm;
        }
        mm_cha.innerHTML = mm;
    } else {
        mm_set.classList.remove("active");
        mm_cha.innerHTML = "01";
    }
}

function add_y(b) {
    var mm = parseInt(b.value);
    var mm_set = document.getElementById("yy_set");
    var mm_cha = document.getElementById("cha_y");

    if (mm > 2021 && mm < 3000) {
        mm_set.classList.add("active");
        mm_cha.innerHTML = mm;
    } else {
        mm_set.classList.remove("active");
        mm_cha.innerHTML = "2021";
    }

}

function full_n(b) {
    var f_name = b.value;
    var cha_name = document.getElementById("cha_name");
    if (f_name.length > 0) {
        cha_name.innerHTML = "<label>" + f_name + "</label>";
    } else {
        cha_name.innerHTML = "<label>FULL NAME</label>";
    }
}

window.addEventListener("contextmenu", (e) => {
    e.preventDefault();
})

var add_cc = document.getElementById("add_cc");
add_cc.addEventListener("submit", (e) => {
    e.preventDefault();
    let tempori
    Swal.fire({
        title: 'Compra realizada',
        text: "Llegará antes de que tus abejas terminen de polinizar. :)",
        timer: 2000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            tempori = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
            }, 100)
        },
        willClose: () => {
            clearInterval(tempori)
        }
    }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
            location.href = "../TpHTML/Compra.html"
        }
    })
})

//Tarjeta de crédito

let MostrarTarjeta = document.querySelector(".main");
let Activo = true

let MostrarFormulario = document.querySelector(".contact_form");
let Activo2 = true
function MostrarTarjetaAzul() {
    let nombre = document.getElementById("nombre").value
    let direccion = document.getElementById("direccion").value
    let telefono = document.getElementById("telefono").value
    let email = document.getElementById("email").value
    let mensaje = document.getElementById("mensaje").value
    if (nombre == "" || direccion == "" || telefono == "" || email == "" || mensaje == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No completaste todos los datos, inténtalo de nuevo.',
            width: 600,
            padding: '3em',
            color: '#FEBA0B',
            background: '#FEBA0B url("../Gifs/beeautiful.gif")',
            backdrop: `
          rgba(239, 243, 21, 0.349)
        `
        })
        return
    }
    if (Activo) {
        MostrarTarjeta.style.display = "block"
        MostrarFormulario.style.display = "none"
        Activo = false
        Activo2 = true
    } else {
        MostrarTarjeta.style.display = "none"
        MostrarTarjeta.style.display = "block"
        Activo = true
        Activo2 = false
    }
}
//Pago contra-entrega
function GuardarCompra() {
    let nombre = document.getElementById("nombre").value
    let direccion = document.getElementById("direccion").value
    let telefono = document.getElementById("telefono").value
    let email = document.getElementById("email").value
    let mensaje = document.getElementById("mensaje").value
    if (nombre == "" || direccion == "" || telefono == "" || email == "" || mensaje == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No completaste todos los datos, inténtalo de nuevo.',
            width: 600,
            padding: '3em',
            color: '#FEBA0B',
            background: '#FEBA0B url("../Gifs/beeautiful.gif")',
            backdrop: `
          rgba(239, 243, 21, 0.349)
        `
        })
        return
    }
    Swal.fire({
        title: 'Realizar pedido',
        text: nombre + ", vamos a enviar todo a " + direccion + ", ¿Seguro?",
        width: 600,
        padding: '3em',
        color: '#FEBA0B',
        background: '#FEBA0B url("../Gifs/beefantastic.gif")',
        backdrop: `
          rgba(239, 243, 21, 0.349)
        `,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Realizar, gracias.'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: '¡Enviado!',
                text: "Llegará antes de que te des cuenta.",
                width: 600,
                padding: '3em',
                color: '#FEBA0B',
                background: '#FEBA0B url("../Gifs/beecool.gif")',
                backdrop: `
      rgba(221, 207, 12, 0.123)
    `,

                timer: 1100,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    location.href = "../TpHTML/Compra.html"
                }
            })
            MostrarFormulario.style.display = "none"
            MostrarTarjeta.style.display = "none"
        }
    })
}
