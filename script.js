const carritoItems = [];

function agregarAlCarrito(nombre, precio) {
    carritoItems.push({ nombre, precio });
    actualizarCarrito();
}

function actualizarCarrito() {
    const carritoLista = document.querySelector('.carrito-items');
    carritoLista.innerHTML = '';
    let total = 0;

    carritoItems.forEach((item, index) => {
        total += item.precio;
        const li = document.createElement('li');
        li.textContent = `${item.nombre} - $${item.precio} UYU`;

        const botonEliminar = document.createElement('button');
        botonEliminar.textContent = 'Eliminar';
        botonEliminar.classList.add('boton-eliminar');
        botonEliminar.onclick = () => eliminarItem(index);
        li.appendChild(botonEliminar);

        carritoLista.appendChild(li);
    });

    document.querySelector('.total').textContent = `Total: $${total} UYU`;
    document.querySelector('.contador-carrito').textContent = carritoItems.length;
}

function eliminarItem(index) {
    carritoItems.splice(index, 1);
    actualizarCarrito();
}

function pagar() {
    alert('Redirigiendo a la plataforma de pago...');
}

function mostrarOcultarCarrito() {
    const carrito = document.getElementById('carrito');
    carrito.classList.toggle('mostrar');
}

function pagar() {
    if (carritoItems.length === 0) {
        alert("El carrito está vacío.");
        return;
    }

    const pedido = carritoItems.map(item => ({
        nombre: item.nombre,
        precio: item.precio,
        cantidad: 1
    }));

    fetch('guardar_pedido.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(pedido)
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        carritoItems.length = 0;
        actualizarCarrito();
    })
    .catch(error => console.error('Error:', error));
}




























