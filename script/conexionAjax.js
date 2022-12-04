function showProductos(filter) {
    var parametros = {
        "filter" : filter
      };
      $.ajax({
        data: parametros,
        url: 'filterProductosAjax.php',
        type: 'POST',
        beforeSend: function() {
            $('.productos').html('<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>');
        },
        success: function (mensaje) {
            $('.productos').html(mensaje);
        }
    });
}

function showTableProductos(table) {
    var parametros = {
        "filter" : table
      };
      $.ajax({
        data: parametros,
        url: 'filterTableProductosAjax.php',
        type: 'POST',
        beforeSend: function() {
            $('.productos').html('<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>');
        },
        success: function (data) {
            $('.productos').html(data);
        }
    });
}

function showCardProductos(card) {
    var parametros = {
        "filter" : card
      };
      $.ajax({
        data: parametros,
        url: 'filterCardProductosAjax.php',
        type: 'POST',
        beforeSend: function() {
            $('.productos').html('<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>');
        },
        success: function (data) {
            $('.productos').html(data);
        }
    });
}

function showUsers(users) {
    var parametros = {
        "filter" : users
      };
      $.ajax({
        data: parametros,
        url: 'filterUsersAjax.php',
        type: 'POST',
        beforeSend: function() {
            $('.productos').html('<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>');
        },
        success: function (data) {
            $('.productos').html(data);
        }
    });
}

function showAddCountCarritoAndBTN(id) {
    var parametros = {
        "id" : id
      };
      $.ajax({
        data: parametros,
        url: 'agregarAlCarrito.php?id='+id,
        type: 'POST',
        beforeSend: function() {
            $('#optionCard'+id).html('<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
        },
        success: function (data) {
            $('#count-carrito').html(data);
            $('#optionCard'+id).html('<a onclick="showDeleteCountCarritoAndBTN('+id+');"><button class="add-touch"> Quitar del carrito <img id="carrito" src="./img/eliminar-carrito.png" alt="Add Producto"> </button></a>');
        }
    });
}

function showDeleteCountCarritoAndBTN(id) {
    var parametros = {
        "id" : id
      };
      $.ajax({
        data: parametros,
        url: 'borrarDelCarrito.php?id='+id,
        type: 'POST',
        beforeSend: function() {
            $('#optionCard'+id).html('<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
        },
        success: function (data) {
            $('#count-carrito').html(data);
            $('#optionCard'+id).html('<a onclick="showAddCountCarritoAndBTN('+id+');"><button class="add-touch"> Agregar al carrito <img id="carrito" src="./img/anadir-al-carritoo.png" alt="Add Producto"> </button></a>');
        }
    });
}

function showProductosCarrito(carrito) {
    var parametros = {
        "datos" : carrito
    };
    $.ajax({
    data: parametros,
    url: 'showProductosCarrito.php',
    type: 'POST',
    beforeSend: function() {
        $('.ver-carrito').html('<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
    },
    success: function (data) {
        $('.ver-carrito').html(data);
    }
    });
}

function deleteDesdeCarrito(id) {
    var parametros = {
        "id" : id
    };
    $.ajax({
    data: parametros,
    url: 'borrarDesdeCarrito.php?id='+id,
    type: 'POST',
    beforeSend: function() {
        $('.ver-carrito').html('<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
    },
    success: function (data) {
        $('.ver-carrito').html(data);
    }
    });
}

function showMensajeControlCompras(){
    $.ajax({
    data: '',
    url: 'showMensajeControlCompras.php',
    type: 'POST',
    beforeSend: function() {
        $('.control-compras').html('<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
    },
    success: function (data) {
        $('.control-compras').html(data);
    }
    });
}

function updateCantidad(id, value){
    $.ajax({
    data: '',
    url: 'updateCantidadAndPrecioFinal.php?id='+id+'&value='+value,
    type: 'POST',
    beforeSend: function() {
        $('#precioF').html('<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
    },
    success: function (data) {
        $('#precioF').html(data);
    }
    });
}

function showDatosPagar(){
    $.ajax({
    data: '',
    url: 'datosPagar.php',
    type: 'POST',
    beforeSend: function() {
        $('.btns-carrito').html('<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
    },
    success: function (data) {
        $('.ver-carrito').html(data);
    }
    });
}




