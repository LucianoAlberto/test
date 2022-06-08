<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8' />
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="css/fullcalendar.css">
    <script src='js/fullcalendar.js'></script>

    <style>
        .fondo{
            background-image: url({{asset("fondo.jpg")}})
        }
    </style>

</head>

<body class="fondo">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade  w-200" style="padding-top:20%" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true" id="modalv1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                </div>
                <div class="modal-body">
                    <input type="text" id="title" placeholder="Introduzca motivo " class="w-100">
                </div>
                <div class="modal-footer">
                    <button type="button" id="botonCerrar" class="btn btn-secondary"
                        data-dismiss="modal">Cerrar</button>
                    <button id="guardar" type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!-- Modal  crear cita-->
    <div id="modalCrear" style="width: 100%; height: 100%; position:absolute; display:none">
        <div style="width: 100%; height: 100%; background-color: black; z-index: 98; opacity: 0.25; position:absolute;">
        </div>
        <div class=" w-100" style="padding-top:20%; z-index: 99; position:absolute">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class=" d-flex  align-middle justify-content-center modal-header bg-opacity-50 w-100 text-white position-relative"
                        style="background: #3A87AD">
                        <span id="citaHeaderCrear" class="fw-bold "></span>
                        <div id="botonCerrarCrear" type="submit" class="btn-danger position-absolute"
                            style="right: 0; top: 0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                    </div>
                    <div class="modal-body">
                        <!--<input type="text" id="titulo_cita"  class="w-100"> -->
                        <input type="text" id="nombreCitaCrear" class="w-100 my-3" placeholder="Nombre" />
                        <textarea id="descripcionCitaCrear" class="w-100 my-2" placeholder="Descripción" rows="5"></textarea>
                        <div class="mt-2 d-flex justify-content-center">
                            {{-- <button type="button"  id="botonCerrar1" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> --}}
                            <button id="crearCita" type="button" class="btn btn-success">Guardar
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-save">
                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                    <polyline points="7 3 7 8 15 8"></polyline>
                                </svg>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!-- Modal  ver/editar cita-->
    <div id="modalv2" style="width: 100%; height: 100%; position:absolute; display:none">
        <div style="width: 100%; height: 100%; background-color: black; z-index: 98; opacity: 0.25; position:absolute;">
        </div>
        <div class=" w-100" style="padding-top:20%; z-index: 99; position:absolute">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class=" d-flex  align-middle justify-content-center modal-header bg-opacity-50 w-100 text-white position-relative"
                        style="background: #3A87AD">
                        <span id="cita_header_fecha" class="fw-bold "></span>
                        <span id="cita_header_horas" class="fw-bold " style="margin-left: 20px"></span>
                        <div id="botonCerrar1" type="submit" class="btn-danger position-absolute"
                            style="right: 0; top: 0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                    </div>
                    <div class="modal-body">
                        <!--<input type="text" id="titulo_cita"  class="w-100"> -->
                        <label style="color: #8a8a8a">Nombre</label>
                        <input type="text" id="nombreCitaEditar" class="w-100 mb-3" placeholder="Nombre" />
                        <label style="color: #8a8a8a">Descripción</label>
                        <textarea id="descripcionCitaEditar" class="w-100 mb-3" placeholder="Descripción"></textarea>
                        <div class="mt-2 d-flex justify-content-center">
                            <button id="guardar_cita_editada" type="button" class="btn btn-success mx-2">Guardar
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-save">
                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                    <polyline points="7 3 7 8 15 8"></polyline>
                                </svg>
                            </button>

                            <div id="eliminar" type="submit"
                                class="btn-danger d-flex justify-content-center align-items-center mx-2"
                                style="width: 115px; height: 50px;border-radius: 5px;">Eliminar
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-trash-2">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                    </path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!--Navbar-->
    <nav class=" d-flex justify-content-center px-5 mx-auto">
        <a href="{{ route('clientes.index') }}"><img src="logo.png" width="60" class="mx-auto py-2"></a>
    </nav>


    <div id='calendar' class="w-50 m-auto p-20 mt-4">
    </div>
</body>
<script src='js/locale/es.js'></script>
<script>
    $(document).ready(function() {
        $('#botonCerrarCrear').on('click', function() {
            //$('#modalv1').css('opacity',0);
            $('#modalCrear').css('display', 'none');
            $('#nombreCitaCrear').val('');
            $('#descripcionCitaCrear').val('');
            $('#crearCita').off();
        })

        $('#mostrar').on('click', function() {
            $('#modalLoginForm').css('opacity', 1);
            $('#modalLoginForm').css('display', 'block');
            swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Evento creado',
                showConfirmButton: false,
                timer: 1500
            });
        })

        //ceramos el modal para ver la cita
        $('#botonCerrar1').on('click', function() {
            //$('#modalv2').css('opacity',0);
            $('#modalv2').css('display', 'none');
            $('#guardar').off();
        })


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'

            }
        });

        var calendar = $('#calendar').fullCalendar({
            //  editable:true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            hiddenDays: [0, 6],
            locale: "es",
            selectable: true,
            selectHelper: true,
            selectOverlap: false,
            slotLabelInterval: "00:15",
            events: function(start, end, timezone, callback) {
                $.ajax({
                    url: '/eventos',
                    dataType: 'json',
                    success: function(data) {
                        var events = [];

                        for (var i = 0; i < data.length; i++) {
                            events.push({
                                id: data[i]['id'],
                                title: data[i]['nombre'],
                                descripcion: data[i]['descripcion'],
                                start: data[i]['comienzo'],
                                end: data[i]['final'],
                            });
                        }
                        callback(events);
                    }
                });

            },

            // eventRender: function(eventObj, $el) {
            //     $el.popover({
            //     title: eventObj.title,
            //     content: eventObj.description,
            //     trigger: 'hover',
            //     placement: 'top',
            //     container: 'body'
            //     });
            // },
            // eventRender: function(calev, elt, view) {
            // if (calev.end.getTime() < now())
            //     elt.style.backgroundColor= "black";
            // },


            dayClick: function(date, jsEvent, view) {
                $('#calendar').fullCalendar('gotoDate', date);
                $('#calendar').fullCalendar('changeView', 'agendaDay');
            },

            select: function(start, end, allDay) {
                var comienzo = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
                var final = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                if (comienzo && allDay) {
                    $('#modalCrear').css('display', 'block');
                    $('#citaHeaderCrear').text($.fullCalendar.formatDate(start, 'hh:mm ') + " - " +
                        ($.fullCalendar.formatDate(end, ' hh:mm')));

                    $('#crearCita').on('click', function() {
                        var nombre = $('#nombreCitaCrear').val();
                        var descripcion = $('#descripcionCitaCrear').val();
                        $.ajax({
                            url: "/eventos/action",
                            type: "POST",
                            data: {
                                nombre: nombre,
                                descripcion: descripcion,
                                comienzo: comienzo,
                                final: final,
                                type: 'add'
                            },
                            success: function(data) {
                                calendar.fullCalendar('refetchEvents');
                                window.Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Evento creado',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        })
                        $('#modalCrear').css('display', 'none');
                        $('#nombreCitaCrear').val("");
                        $('#descripcionCitaCrear').val("");
                        $('#crearCita').off();
                    })
                }
            },

            eventResize: function(event, delta) {
                var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                var title = event.title;
                var descripcion = event.descripcion;
                var id = event.id;

                $.ajax({
                    url: "/eventos/action",
                    type: "POST",
                    data: {
                        nombre: title,
                        comienzo: start,
                        final: end,
                        id: id,
                        descripcion: descripcion,
                        type: 'update'
                    },
                    success: function(response) {
                        calendar.fullCalendar('refetchEvents');
                        window.Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Evento editado',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                })
                //Limpiamos los eventos del calendario
                $('#calendar').off();
            },

            eventDrop: function(event, delta) {
                var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                var title = event.title;
                var id = event.id;
                $.ajax({
                    url: "/eventos/action",
                    type: "POST",
                    data: {
                        nombre: title,
                        comienzo: start,
                        final: end,
                        id: id,
                        type: 'update'
                    },
                    success: function(response) {
                        calendar.fullCalendar('refetchEvents');

                        window.Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Evento editado',
                            showConfirmButton: false,
                            timer: 1500
                        });

                    }
                })
                //Limpiamos los eventos del calendario
                $('#calendar').off();
            },

            eventClick: function(event) {
                $('#modalv2').css('display', 'block');
                $('#nombreCitaEditar').val(event.title);
                $('#descripcionCitaEditar').val(event.descripcion);
                $('#cita_header_fecha').text($.fullCalendar.formatDate(event.start,
                    'dddd, D MMMM YYYY '));
                $('#cita_header_horas').text($.fullCalendar.formatDate(event.start, 'HH:mm') +
                    " - " + $.fullCalendar.formatDate(event.end, 'HH:mm'));
                let evento = $('.fc-event-container');

                $('#guardar_cita_editada').on('click', function() {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var nombre = $('#nombreCitaEditar').val();
                    var descripcion = $('#descripcionCitaEditar').val();
                    var id = event.id;
                    $.ajax({
                        url: "/eventos/action",
                        type: "POST",
                        data: {
                            nombre: nombre,
                            descripcion: descripcion,
                            comienzo: start,
                            final: end,
                            id: id,
                            type: 'update'
                        },
                        success: function(response) {
                            calendar.fullCalendar('refetchEvents');
                            window.Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Evento editado',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            //cerramos el modal
                            $('#modalv2').css('display', 'none');
                            $('#nombreCitaEditar').text("");
                            $('#descripcionCitaEditar').text("");
                            $('#calendar').off();
                            calender
                        }
                    })
                })

                $('#eliminar').on('click', function() {
                    Swal.fire({
                        title: '¿Estás segura?',
                        text: "No podrás recuperar el evento.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, elimínalo'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var id = event.id;
                            $.ajax({
                                url: "/eventos/action",
                                type: "POST",
                                data: {
                                    id: id,
                                    type: "delete"
                                },
                                success: function(response) {
                                    calendar.fullCalendar(
                                        'refetchEvents');
                                    window.Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Evento eliminado',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            })

                        }
                        $('#modalv2').css('display', 'none');
                        $('#nombreCitaEditar').text("");
                        $('#descripcionCitaEditar').text("");
                        $('#calendar').off();
                    })
                    $('#nombreCitaEditar').val("");
                    $('#descripcionCitaEditar').val("");
                    $('#calendar').off();
                })
            }

        });
    });
</script>

</html>
