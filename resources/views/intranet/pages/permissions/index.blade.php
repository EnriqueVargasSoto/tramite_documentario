@extends('intranet.layouts.layout')

@section('styles')
<!-- Vendors CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/node-waves/node-waves.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />


<link rel="stylesheet" href="{{asset('assets/vendor/libs/form-validation/form-validation.css')}}" />

@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">Permissions List</h4>

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
              <th>Name</th>
              <th>Assigned To</th>
              <th>Created Date</th>
              <th>Actions</th>
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
              <h3 class="mb-2">Add New Permission</h3>
              <p class="text-muted">Permissions you may use and assign to your users.</p>
            </div>
            <form id="addPermissionForm" class="row" onsubmit="return false">
              <div class="col-12 mb-3">
                <label class="form-label" for="modalPermissionName">Permission Name</label>
                <input
                  type="text"
                  id="modalPermissionName"
                  name="modalPermissionName"
                  class="form-control"
                  placeholder="Permission Name"
                  autofocus />
              </div>
              <div class="col-12 mb-2">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="corePermission" />
                  <label class="form-check-label" for="corePermission"> Set as core permission </label>
                </div>
              </div>
              <div class="col-12 text-center demo-vertical-spacing">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">Create Permission</button>
                <button
                  type="reset"
                  class="btn btn-label-secondary"
                  data-bs-dismiss="modal"
                  aria-label="Close">
                  Discard
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
              <h3 class="mb-2">Edit Permission</h3>
              <p class="text-muted">Edit permission as per your requirements.</p>
            </div>
            <div class="alert alert-warning" role="alert">
              <h6 class="alert-heading mb-2">Warning</h6>
              <p class="mb-0">
                By editing the permission name, you might break the system permissions functionality. Please
                ensure you're absolutely certain before proceeding.
              </p>
            </div>
            <form id="editPermissionForm" class="row" onsubmit="return false">
              <div class="col-sm-9">
                <label class="form-label" for="editPermissionName">Permission Name</label>
                <input
                  type="text"
                  id="editPermissionName"
                  name="editPermissionName"
                  class="form-control"
                  placeholder="Permission Name"
                  tabindex="-1" />
              </div>
              <div class="col-sm-3 mb-3">
                <label class="form-label invisible d-none d-sm-inline-block">Button</label>
                <button type="submit" class="btn btn-primary mt-1 mt-sm-0">Update</button>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="editCorePermission" />
                  <label class="form-check-label" for="editCorePermission"> Set as core permission </label>
                </div>
              </div>
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

<!-- jQuery desde CDN -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

{{-- <script>
/**
 * App user list (jquery)
 */

 'use strict';

$(function () {
  var dataTablePermissions = $('.datatables-permissions'),
    dt_permission,
    userList = 'app-user-list.html';
    var cantRegistros = 10;//dataTablePermissions.DataTable().page.len();
    var apiUrl = 'http://127.0.0.1:8000/api/permissions?page=1&per_page='+cantRegistros;

  // Users List datatable
  if (dataTablePermissions.length) {

    dt_permission = dataTablePermissions.DataTable({
      //ajax: assetsPath + 'json/permissions-list.json', // JSON file to add data
      processing: true,
        serverSide: true,
      ajax: {
        url: apiUrl,
       // dataSrc: 'data.data' // Ruta hacia los datos en la respuesta paginada
       dataSrc: function (json) {
        var data = json.data.data; // Los datos de la respuesta




        return data;
        }
      },
      columns: [
        // columns according to JSON
        { data: '' },
        { data: 'id' },
        { data: 'name' },
        { data: 'guard_name' },
        { data: 'created_at' },
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
            for (var i = 0; i < $assignedTo.length; i++) {
              var val = $assignedTo[i]['name'];
              $output += roleBadgeObj[val];
            }
            return '<span class="text-nowrap">' + $output + '</span>';
          }
        },
        {
          // remove ordering from Name
          targets: 4,
          orderable: false,
          render: function (data, type, full, meta) {
            var $date = full['created_at'];
            return '<span class="text-nowrap">' + $date + '</span>';
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
              '<span class="text-nowrap"><button class="btn btn-sm btn-icon me-2" data-bs-target="#editPermissionModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="ti ti-edit"></i></button>' +
              '<button class="btn btn-sm btn-icon delete-record"><i class="ti ti-trash"></i></button></span>'
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
      /* drawCallback: function (settings) {
        console.log('settings: ',settings);
        var api = this.api();
        console.log('api: ',api);
        var totalPages = api.page.info().pages;
        console.log('total de paginas: ',totalPages);
        // Lógica para manejar la paginación
        /* if (totalPages > 1) {
          // Muestra los controles de paginación
          $('.dataTables_paginate').show();
        } else {
          // Oculta los controles si hay solo una página
          $('.dataTables_paginate').hide();
        }
      } */
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


</script> --}}

<script>
    $(document).ready(function () {
        var dataTablePermissions = $('.datatables-permissions'),
        dt_permission,
        userList = 'app-user-list.html';
        var cantRegistros = 10;//dataTablePermissions.DataTable().page.len();
        var apiUrl = 'http://127.0.0.1:8000/api/permissions?page=1&per_page='+cantRegistros;

        $.ajax({
            url: apiUrl,
            type: 'GET',
            success: function (response) {

                const {current_page, data, first_page_url, from, last_page, last_page_url, links, next_page_url, path, per_page, prev_page_url, to, total} = response;

                if (dataTablePermissions.length){
                    dt_permission = dataTablePermissions.DataTable({
                        processing: true,
                        serverSide: true,
                        data: data || [],
                        ajax: {
                            url: apiUrl,
                        // dataSrc: 'data.data' // Ruta hacia los datos en la respuesta paginada
                            dataSrc: function (json) {
                                //var data = json.data; // Los datos de la respuesta




                                return json.data;
                            }
                        },
                        columns: [
                            // columns according to JSON
                            { data: '' },
                            { data: 'id' },
                            { data: 'name' },
                            { data: 'guard_name' },
                            { data: 'created_at' },
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
                                    for (var i = 0; i < $assignedTo.length; i++) {
                                    var val = $assignedTo[i]['name'];
                                    $output += roleBadgeObj[val];
                                    }
                                    return '<span class="text-nowrap">' + $output + '</span>';
                                }
                            },
                            {
                                // remove ordering from Name
                                targets: 4,
                                orderable: false,
                                render: function (data, type, full, meta) {
                                    var $date = full['created_at'];
                                    return '<span class="text-nowrap">' + $date + '</span>';
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
                                    '<span class="text-nowrap"><button class="btn btn-sm btn-icon me-2" data-bs-target="#editPermissionModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="ti ti-edit"></i></button>' +
                                    '<button class="btn btn-sm btn-icon delete-record"><i class="ti ti-trash"></i></button></span>'
                                    );
                                }
                            }
                        ],
                        paging: true,
                        lengthChange: true,
                        pageLength: per_page || 10,
                    });
                }

                $('.datatables-permissions tbody').on('click', '.delete-record', function () {
                    dt_permission.row($(this).parents('tr')).remove().draw();
                });

                setTimeout(() => {
                    $('.dataTables_filter .form-control').removeClass('form-control-sm');
                    $('.dataTables_length .form-select').removeClass('form-select-sm');
                }, 300);
            }
        });


    });


</script>
@endsection

