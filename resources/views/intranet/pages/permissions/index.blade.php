@extends('intranet.layouts.layout')

@section('styles')
<!-- Vendors CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/node-waves/node-waves.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />

<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/form-validation/form-validation.css')}}" />

@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{session('error')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <h4 class="mb-4">Permisos</h4>

    <p class="mb-4">
      Each category (Basic, Professional, and Business) includes the four predefined roles shown below.
    </p>

    <!-- Permission Table -->
    <div class="card">
      <div class="card-datatable table-responsive">
        <table class="datatables-permissions table border-top">
          <thead>
            <tr>
              <th></th>
              <th></th>
              <th>Permiso</th>
              <th>Asignado a</th>
              <th>Descripcion</th>
              <th>Fecha de creación</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
    <!--/ Permission Table -->

    <!-- Modal -->
    <!-- Add Permission Modal -->
    <div class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3 p-md-5">
          <button
            type="button"
            class="btn-close btn-pinned"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
          <div class="modal-body">
            <div class="text-center mb-4">
              <h3 class="mb-2">Agregar Nuevo Permiso</h3>
              <p class="text-muted">Permisos que puede utilizar y asignar a sus usuarios.</p>
            </div>
            <form class="row" action="{{route('permissions.store')}}" method="POST">
                @csrf
              <div class="col-12">
                <label class="form-label" for="editPermissionName">Nombre del permiso</label>
                <input
                  type="text"
                  name="name"
                  class="form-control"
                  placeholder="Nombre del permiso"
                  autofocus />

                  <input
                  type="text"
                  name="guard_name"
                  class="form-control"
                  value="web" hidden/>
              </div>
              <div class="col-12">
                <label class="form-label" for="editPermissionName">Descripcion del permiso</label>

                  <textarea name="description" id="description" class="form-control" placeholder="Descripcion del permiso"></textarea>

              </div>
              {{-- <div class="col-12 mb-2">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="corePermission" />
                  <label class="form-check-label" for="corePermission"> Set as core permission </label>
                </div>
              </div> --}}
              <div class="col-12 text-center demo-vertical-spacing">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">Agregar Permiso</button>
                <button
                  type="reset"
                  class="btn btn-label-secondary"
                  data-bs-dismiss="modal"
                  aria-label="Close">
                  Cancelar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--/ Add Permission Modal -->

    <!-- Edit Permission Modal -->
    <div class="modal fade" id="editPermissionModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3 p-md-5">
          <button
            type="button"
            class="btn-close btn-pinned"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
          <div class="modal-body">
            <div class="text-center mb-4">
              <h3 class="mb-2">Editar Permiso</h3>
              <p class="text-muted">Edite el permiso según sus requisitos.</p>
            </div>
            <div class="alert alert-warning" role="alert">
              <h6 class="alert-heading mb-2">Warning</h6>
              <p class="mb-0">
                Al editar el nombre del permiso, es posible que se rompa la funcionalidad de permisos del sistema. Por favor
                asegúrese de estar absolutamente seguro antes de continuar.
              </p>
            </div>
            <form method="POST" action="{{ route('permissions.update', ':id') }}">
                @csrf
                @method('PUT')
              <div class="col-sm-12">
                <label class="form-label" for="editPermissionName">Nombre del permiso</label>
                <input
                  type="text"
                  id="id"
                  name="id"
                  class="form-control"
                  tabindex="-1" hidden />
                <input
                  type="text"
                  id="name"
                  name="name"
                  class="form-control"
                  placeholder="Nombre del permiso"
                  tabindex="-1" />
              </div>
              <div class="col-sm-12">
                <label class="form-label" for="editPermissionName">Descripcion del permiso</label>

                  <textarea name="description" id="description" class="form-control" placeholder="Descripcion del permiso"></textarea>

              </div>
              <div class="col-sm-3 mb-3">
                <label class="form-label invisible d-none d-sm-inline-block">Button</label>
                <button type="submit" class="btn btn-primary mt-1 mt-sm-0">Actualizar</button>
              </div>
              {{-- <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="editCorePermission" />
                  <label class="form-check-label" for="editCorePermission"> Set as core permission </label>
                </div>
              </div> --}}
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--/ Edit Permission Modal -->

    <!-- /Modal -->
  </div>
@endsection

@section('scripts')
 <!-- Vendors JS -->
 <script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
 <script src="{{asset('assets/vendor/libs/form-validation/popular.js')}}"></script>
 <script src="{{asset('assets/vendor/libs/form-validation/bootstrap5.js')}}"></script>
 <script src="{{asset('assets/vendor/libs/form-validation/auto-focus.js')}}"></script>

 <!-- Page JS -->
{{-- <script src="{{asset('assets/js/app-access-permission.js')}}"></script> --}}
<script src="{{asset('assets/js/modal-add-permission.js')}}"></script>
<script src="{{asset('assets/js/modal-edit-permission.js')}}"></script>

<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.43/moment-timezone-with-data.min.js"></script>


<!-- jQuery desde CDN -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<script>
/**
 * App user list (jquery)
 */

 'use strict';

$(function () {
  var dataTablePermissions = $('.datatables-permissions'),
    dt_permission,

    userList = 'app-user-list.html';
    var cantRegistros = 10;//dataTablePermissions.DataTable().page.len();
    var apiUrl = 'http://127.0.0.1:8000/api/permissions';
    const statusObj = {
            /* 1: { title: 'Pending', class: 'bg-label-warning' }, */
            1: { title: 'Activo', class: 'bg-label-success' },
            0: { title: 'Inactivo', class: 'bg-label-secondary' }
            };

  // Users List datatable
  if (dataTablePermissions.length) {

    dt_permission = dataTablePermissions.DataTable({

      processing: true,
        serverSide: true,
      ajax: {
        url: apiUrl,
        data: function (d) {
            // Envía los parámetros page y per_page
            d.page = d.start / d.length + 1; // Calcula el número de página
            d.per_page = d.length;
            d.search = $('#DataTables_Table_0_filter input').val();
            return d;
        }
      },
      columns: [
        // columns according to JSON
        { data: '' },
        { data: 'id' },
        { data: 'name' },
        { data: 'guard_name' },
        { data: 'description' },
        { data: 'created_at' },
        { data: 'status' },
        { data: '' }
      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          orderable: false,
          searchable: false,
          responsivePriority: 2,
          targets: 0,
          render: function (data, type, full, meta) {
            return '';
          }
        },
        {
          targets: 1,
          searchable: false,
          visible: false
        },
        {
          // Name
          targets: 2,
          render: function (data, type, full, meta) {
            var $name = full['name'];
            return '<span class="text-nowrap">' + $name + '</span>';
          }
        },
        {
          // User Role
          targets: 3,
          orderable: false,
          render: function (data, type, full, meta) {
            var $assignedTo = full['roles'],
              $output = '';
            var roleBadgeObj = {
              Admin: '<a href="' + userList + '"><span class="badge bg-label-primary m-1">Administrator</span></a>',
              Manager: '<a href="' + userList + '"><span class="badge bg-label-warning m-1">Manager</span></a>',
              Users: '<a href="' + userList + '"><span class="badge bg-label-success m-1">Users</span></a>',
              Support: '<a href="' + userList + '"><span class="badge bg-label-info m-1">Support</span></a>',
              Restricted:
                '<a href="' + userList + '"><span class="badge bg-label-danger m-1">Restricted User</span></a>'
            };
            var defaultBadge =  '<a href="' + userList + '"><span class="badge bg-label-success m-1">Users</span></a>';
                            // Si $role no existe en roleBadgeObj, se usa el ícono por defecto
                            //var badge = roleBadgeObj[$role] || defaultBadge;
            for (var i = 0; i < $assignedTo.length; i++) {
              var val = $assignedTo[i]['name'];
              $output += roleBadgeObj[val] || defaultBadge;
            }
            return '<span class="text-nowrap">' + $output + '</span>';
          }
        },
        {
          // Name
          targets: 4,
          render: function (data, type, full, meta) {
            var $description = full['description'] != null ? full['description'] : 'No description';
            return '<span class="text-nowrap">' + $description + '</span>';
          }
        },
        {
          // remove ordering from Name
          targets: 5,
          orderable: false,
          render: function (data, type, full, meta) {
            var $date = full['created_at'];
            var formattedDate = moment.utc($date).tz('America/Lima').format('DD/MM/YYYY hh:mm:ss A'); // Cambia 'America/Lima' según tu zona horaria

            return '<span class="text-nowrap">' + formattedDate + '</span>';
          }
        },
        {
          // remove ordering from Name
          targets: 6,
          orderable: false,
          render: function (data, type, full, meta) {
             var $status = full['status'];

                            return (
                            '<span class="badge ' +
                            statusObj[$status].class +
                            '" text-capitalized>' +
                            statusObj[$status].title +
                            '</span>'
                            );
          }
        },
        {
          // Actions
          targets: -1,
          searchable: false,
          title: 'Actions',
          orderable: false,
          render: function (data, type, full, meta) {
            return (
              '<span class="text-nowrap"><button class="btn btn-sm btn-icon me-2 edit-btn" '+'data-id="' + full.id + '" '+'data-name="' + full.name + '" '+'data-description="' + full.description + '" ' +' data-bs-target="#editPermissionModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="ti ti-edit"></i></button>' +
              '<button class="btn btn-sm btn-icon me-2 delete-btn" '+'data-id="' + full.id + '" '+'data-name="' + full + '" ><i class="ti ti-trash"></i></button></span>'
            );
          }
        }
      ],
      order: [[1, 'asc']],
      dom:
        '<"row mx-1"' +
        '<"col-sm-12 col-md-3" l>' +
        '<"col-sm-12 col-md-9"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end justify-content-center flex-wrap me-1"<"me-3"f>B>>' +
        '>t' +
        '<"row mx-2"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      language: {
        sLengthMenu: 'Ver _MENU_',
        search: 'Buscar',
        searchPlaceholder: 'Buscar...',
        paginate: {
          first: 'Primera',
          previous: 'Anterior',
          next: 'Siguiente',
          last: 'Última'
        },
        info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
        infoEmpty: 'No hay registros disponibles',
        infoFiltered: '(filtrado de _MAX_ registros)',
        zeroRecords: 'No se encontraron registros coincidentes',
        emptyTable: 'No hay datos disponibles en la tabla',
        loadingRecords: 'Cargando...',
        processing: 'Procesando...',
      },
      // Buttons with Dropdown
      buttons: [
        {
          text: 'Agregar Permiso',
          className: 'add-new btn btn-primary mb-3 mb-md-0 waves-effect waves-light',
          attr: {
            'data-bs-toggle': 'modal',
            'data-bs-target': '#addPermissionModal'
          },
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
          }
        }
      ],
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['name'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      },
      initComplete: function () {
        var tableApi = this.api(); // Ensure correct context for `api()`
        // Adding role filter once table initialized
        this.api()
          .columns(3)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role </option></select>'
            )
              .appendTo('.user_role')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
              });
          });


      },

    });
  }

  // Delete Record
  $('.datatables-permissions tbody').on('click', '.delete-record', function () {
    dt_permission.row($(this).parents('tr')).remove().draw();
  });

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
});

$(document).on('click', '.edit-btn', function () {
  // Obtener datos del botón
  var id = $(this).data('id');
  var name = $(this).data('name');
  var description = $(this).data('description');
    console.log('name:', name);
  // Llenar el formulario del modal
  $('#editPermissionModal input[name="id"]').val(id);
  $('#editPermissionModal input[name="name"]').val(name);
  $('#editPermissionModal textarea[name="description"]').val(description);
});

$(document).on('click', '.delete-btn', function () {

    var id = $(this).data('id');
    var permission = $(this).data('name');

      Swal.fire({
        title: 'Estas seguro?',
        text: "No podrás revertir el permiso!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, Eliminar permiso!',
        cancelButtonText: 'No, Cancelar!',
        customClass: {
          confirmButton: 'btn btn-primary me-2 waves-effect waves-light',
          cancelButton: 'btn btn-label-secondary waves-effect waves-light'
        },
        buttonsStyling: false
      }).then(function (result) {
        console.log('id: ', id);
        console.log('ruta: ', `/permissions/${permission}`);
        console.log('result: ', result);
        if (result.value) {
            $.ajax({
                url: `/permissions/${id}`, // Endpoint de tu API
                type: 'DELETE', // Método HTTP para eliminar
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Token CSRF
                },
                success: function (response) {
                    // Mostrar mensaje de éxito y recargar la tabla

                    console.log('response: ', response);
                    Swal.fire({
                        icon: 'success',
                        title: 'Eliminado!',
                        text: 'Permiso eliminado correctamente.',
                        customClass: {
                        confirmButton: 'btn btn-success waves-effect waves-light'
                        }
                    }).then(() => {
                        // Recarga la tabla o realiza otras acciones necesarias
                        $('.datatables-permissions').DataTable().ajax.reload();
                    });
                },
                error: function (xhr) {
                    console.log(xhr);
                    // Manejar errores de la llamada AJAX
                    Swal.fire({
                        title: 'Error',
                        text: 'No se pudo eliminar el permiso. Por favor, inténtelo de nuevo.',
                        icon: 'error',
                        customClass: {
                        confirmButton: 'btn btn-danger waves-effect waves-light'
                        }
                    });
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire({
            title: 'Cancelada',
            text: 'Eliminacion cancelada :)',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success waves-effect waves-light'
            }
          });
        }
      });

});



</script>

@endsection

