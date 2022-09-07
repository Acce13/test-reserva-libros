//Inicializamos una variable donde almacenaremos el modal
let myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
//Ejecutamos un evento cuando el modal se cierra, de esta forma reseteamos los mensajes de confirmacion y error
$("#exampleModal").on('hidden.bs.modal', function(e) { initMessageResponse(); });

//Inicamos el DOM
$(function() {
    $("#bookLoading").hide(); //Ocultamos el loading
    initMessageResponse(); //Reset e init los alert y el campo days
    getBookList(''); //Ejecutamos la consulta de todos los libros
});

function initMessageResponse() {
    $("#bookError").hide(); //Ocultamos el alert
    $("#bookSuccess").hide(); //Ocultamos el alert
    $("#bookDays").val(null); //El valor del input days lo dejamos null
}

function getBookList(genderId) { //Recibimos el genero del libro
    $.ajax({ //Usamos Ajax
        method: 'GET', //Metodo GET
        url: './get-book-list', //Url del recurso 
        data: { genderId }, //Pasamos el genero
        beforeSend: function() { //Antes de enviar ejecutamos una funcion
            $("#bookList").empty(); //Reseteamos el contenido
            $("#bookLoading").show(); //Mostramos el loading
        },
        complete: function() { //Una vez completado ocultamos el loading
            $("#bookLoading").hide();
        },
        success: function(response) {
            showBookList(response); //Mostramos los libros
        }  
    })
}

function showBookList(data) { //Recibimos como argumento la data
    if (data.length > 0) { // Validamos si hay o no libros en nuestro arreglo
        data.forEach(element => { //Recorremos el arreglo con un forEach
            //Y por cada elemento hacemos un append()
            $("#bookList").append(`<div class='col-6 col-sm-4'><img src='storage/${element.imageUrl}' alt=${element.title} class='book img-fluid rounded-3 shadow' onClick='showBook(${element.id})' /></div>`);
        });
        return;
    }
    //Si no hay libros, mostramos un mensaje de alerta
    $("#bookList").append('<h6>All books are reserved!</h6>');
}

function showBook(id) { //Recibimos como argumento el id del libro a consultar
    $.ajax({
        method: 'GET', //Metodo GET
        url: `./book-list/${id}`, //Ruta del recurso
        complete: function() { //Una vez completado mostramos el modal
            myModal.show(); //Mostrar modal
        },
        success: function(response) { //Una vez este todo correcto
            showBookModal(response); //Mostramos la info en el modal
        }
    })
}

function showBookModal(book) { //Esta funcion recibe la consulta del libro en un objeto
    $("#bookId").val(book.id); //Imprimimos el id en un input oculto, para usarlo en la reservation
    $("#bookTitle").html(book.title); //Imprimimos el titulo
    $("#bookAuthor").html(book.author); //Imprimimos el autor
    $("#bookDescription").html(book.description); //Imprimimos el descripcion
    $("#bookImageUrl").attr('src', `storage/${book.imageUrl}`); //Mostramos la imagen
}

$("#bookGender").on('change', function(event) { //Se ejecuta cuando seleccionamos un genero por filtrar
    getBookList(event.target.value); //Ejecutamos la funcion de obtener listado de libros linea 19
});

$("#bookReserve").click(function() { //Se ejcuta cuando vayamos a reservar un libro
    let id = $("#bookId").val(); //Obtenemos el id del libro
    let days = $("#bookDays").val(); //Obtenemos los dias
    let _token = $("meta[name='csrf-token']").attr("content"); //Obtenemos el csrf_token

    $.ajax({ //Usamos ajax
        method: 'PUT', //Metodo PUT
        url: `./book-list/${id}/reserve`, //Ruta del recurso
        data: { _token, days }, //Pasamos los valores
        beforeSend: function() { //Antes de enviar reseteamos todos los alert y el input days
            initMessageResponse();
        },
        success: function(response) { //Una vez resulto
            $("#bookSuccess").show(); //Mostramos el mensaje de confirmacion
            $("#bookSuccess").html(response.message); //Imprimimos el mensaje de confirmacion
            getBookList(''); //Volvemos a ejecutar la funcion de obtener listado de libros - linea 19
        },
        error: function(error) { //Si existen errores
            $("#bookError").show() //Mostramos el alert
            $("#bookError").html(error.responseJSON.errors.days[0]); //E imprimimos los errores
        }
    });
});

