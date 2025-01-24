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

    <h4 class="mb-4">Roles</h4>

    <p class="mb-4">
        Un rol proporcionaba acceso a menús y funciones predefinidos para que, dependiendo de <br />
        rol asignado un administrador puede tener acceso a lo que el usuario necesita.
    </p>
    <!-- Role cards -->
    <div class="row g-4">
        @foreach ($roles as $role)
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="fw-normal mb-2">Total {{count($role->users)}} usuarios</h6>
                            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                @foreach ($role->users as $user)
                                <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    title="{{$user->name}}"
                                    class="avatar avatar-sm pull-up">
                                    <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="Avatar" />
                                </li>
                                @endforeach
                                {{-- <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    title="Vinnie Mostowy"
                                    class="avatar avatar-sm pull-up">
                                    <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="Avatar" />
                                </li>
                                <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    title="Allen Rieske"
                                    class="avatar avatar-sm pull-up">
                                    <img class="rounded-circle" src="../../assets/img/avatars/12.png" alt="Avatar" />
                                </li>
                                <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    title="Julee Rossignol"
                                    class="avatar avatar-sm pull-up">
                                    <img class="rounded-circle" src="../../assets/img/avatars/6.png" alt="Avatar" />
                                </li>
                                <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    title="Kaith D'souza"
                                    class="avatar avatar-sm pull-up">
                                    <img class="rounded-circle" src="../../assets/img/avatars/3.png" alt="Avatar" />
                                </li>
                                <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    title="John Doe"
                                    class="avatar avatar-sm pull-up">
                                    <img class="rounded-circle" src="../../assets/img/avatars/1.png" alt="Avatar" />
                                </li> --}}
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-end mt-1">
                            <div class="role-heading">
                                <h4 class="mb-1">{{$role->name}}</h4>
                                <a
                                    href="javascript:;"
                                    data-bs-toggle="modal"
                                    data-bs-target="#addRoleModal"
                                    data-id="{{$role->id}}"
                                    data-name="{{$role->name}}"
                                    class="role-edit-modal">
                                    <span>Editar Rol</span>
                                </a>
                            </div>
                            <a href="javascript:void(0);" class="text-muted"><i class="ti ti-copy ti-md"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card h-100">
                <div class="row h-100">
                    <div class="col-sm-5">
                        <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                            <img
                            src="{{asset('assets/img/illustrations/add-new-roles.png')}}"
                            class="img-fluid mt-sm-4 mt-md-0"
                            alt="add-new-roles"
                            width="83" />
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body text-sm-end text-center ps-sm-0">
                            <button data-bs-target="#addRoleModal" data-bs-toggle="modal" class="btn btn-primary mb-2 text-nowrap add-new-role">
                                Agregar Rol
                            </button>
                            <p class="mb-0 mt-1">Agregar rol, si no existe</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <!-- Role Table -->
            <div class="card">
                <div class="card-datatable table-responsive">
                    <table class="datatables-users table border-top">
                        <thead>
                            <tr>
                                <th></th>
                                {{-- <th>User</th> --}}
                                <th>Role</th>
                                <th>Guard</th>
                                <th>Fecha</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!--/ Role Table -->
        </div>

    </div>
    <!--/ Role cards -->

    <!-- Add Role Modal -->
    <!-- Add Role Modal -->
    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <button
                    type="button"
                    class="btn-close btn-pinned"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <h3 class="role-title mb-2">Agregar Nuevo Rol</h3>
                        <p class="text-muted">Establecer permisos de rol</p>
                    </div>
                    <!-- Add role form -->
                    <form class="row g-3" action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="col-12 mb-4">
                            <label class="form-label" for="modalRoleName">Nombre del Rol</label>
                            <input
                            type="text"
                            id="modalRoleName"
                            name="name"
                            class="form-control"
                            placeholder="Ingrese el Nombre del Rol"
                            tabindex="-1" />
                        </div>
                        <div class="col-12">
                            <h5>Permisos de Rol</h5>
                            <!-- Permission table -->
                            <div class="table-responsive">
                            <table class="table table-flush-spacing">
                                <tbody>
                                    @foreach ($agrupados as $categoria => $acciones)
                                    <tr>
                                        <td class="text-nowrap fw-medium">{{ ucfirst($categoria) }}</td>
                                        <td>
                                            <div class="d-flex">
                                                @foreach ($acciones as $permiso)
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" type="checkbox" id="permisos{{ $permiso['id'] }}" name="permisos[{{ $categoria }}][]" value="{{ $permiso['id'] }}"/>
                                                        <label class="form-check-label" for="permisos{{ $permiso['id'] }}"> {{ ucfirst($permiso['accion']) }} </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                            <!-- Permission table -->
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Agregar</button>
                            <button
                            type="reset"
                            class="btn btn-label-secondary"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                            Cancelar
                            </button>
                        </div>
                    </form>
                    <!--/ Add role form -->
                </div>
            </div>
        </div>
    </div>
    <!--/ Add Role Modal -->

    <!-- / Add Role Modal -->
  </div>
@endsection

@section('scripts')
 <!-- Vendors JS -->
 <script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
 <script src="{{asset('assets/vendor/libs/form-validation/popular.js')}}"></script>
 <script src="{{asset('assets/vendor/libs/form-validation/bootstrap5.js')}}"></script>
 <script src="{{asset('assets/vendor/libs/form-validation/auto-focus.js')}}"></script>

 <!-- Page JS -->
{{-- <script src="{{asset('assets/js/app-access-roles.js')}}"></script> --}}
<script src="{{asset('assets/js/modal-add-role.js')}}"></script>{{--
<script src="{{asset('assets/js/modal-edit-permission.js')}}"></script> --}}
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.43/moment-timezone-with-data.min.js"></script>

<script>
    /**
    * App user list
    */

    'use strict';

    // Datatable (jquery)
    $(function () {
        var dtUserTable = $('.datatables-users'),
            statusObj = {
            /* 1: { title: 'Pending', class: 'bg-label-warning' }, */
            1: { title: 'Activo', class: 'bg-label-success' },
            0: { title: 'Inactivo', class: 'bg-label-secondary' }
            };

        var userView = 'app-user-view-account.html';

        var cantRegistros = 10;//dataTablePermissions.DataTable().page.len();
        var apiUrl = 'http://127.0.0.1:8000/api/roles';

        // Users List datatable
        if (dtUserTable.length) {
            var dtUser = dtUserTable.DataTable({
                processing: true,
                serverSide: true,
                //ajax: assetsPath + 'json/user-list.json', // JSON file to add data
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
                    /* { data: 'full_name' }, */
                    { data: 'name' },
                    { data: 'guard_name' },
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
                        // User Role
                        targets: 1,
                        render: function (data, type, full, meta) {
                            var $role = full['name'];
                            var roleBadgeObj = {
                                Subscriber:
                                    '<span class="badge badge-center rounded-pill bg-label-warning me-3 w-px-30 h-px-30"><i class="ti ti-user ti-sm"></i></span>',
                                Author:
                                    '<span class="badge badge-center rounded-pill bg-label-success me-3 w-px-30 h-px-30"><i class="ti ti-settings ti-sm"></i></span>',
                                Maintainer:
                                    '<span class="badge badge-center rounded-pill bg-label-primary me-3 w-px-30 h-px-30"><i class="ti ti-chart-pie-2 ti-sm"></i></span>',
                                Editor:
                                    '<span class="badge badge-center rounded-pill bg-label-info me-3 w-px-30 h-px-30"><i class="ti ti-edit ti-sm"></i></span>',
                                Admin:
                                    '<span class="badge badge-center rounded-pill bg-label-secondary me-3 w-px-30 h-px-30"><i class="ti ti-device-laptop ti-sm"></i></span>'
                            };
                            var defaultBadge =  '<span class="badge badge-center rounded-pill bg-label-warning me-3 w-px-30 h-px-30"><i class="ti ti-user ti-sm"></i></span>';
                            // Si $role no existe en roleBadgeObj, se usa el ícono por defecto
                            var badge = roleBadgeObj[$role] || defaultBadge;
                            return "<span class='text-truncate d-flex align-items-center'>" + badge + $role + '</span>';
                        }
                    },
                    {
                        // Plans
                        targets: 2,
                        render: function (data, type, full, meta) {
                            var $plan = full['guard_name'];

                            return '<span class="fw-medium">' + $plan + '</span>';

                        }
                    },
                    {
                        // Plans
                        targets: 3,
                        render: function (data, type, full, meta) {
                            /* var $plan = full['guard_name'];

                            return '<span class="fw-medium">' + $plan + '</span>'; */
                            var $date = full['created_at'];
                            var formattedDate = moment.utc($date).tz('America/Lima').format('DD/MM/YYYY hh:mm:ss A'); // Cambia 'America/Lima' según tu zona horaria

                            return '<span class="text-nowrap">' + formattedDate + '</span>';
                        }
                    },
                    {
                        // User Status
                        targets: 4,
                        render: function (data, type, full, meta) {
                            var $status = full['status'];

                            return (
                            '<span class="badge ' +
                            statusObj[$status].class +
                            '" text-capitalized>' +
                            statusObj[$status].title +
                            '</span>'
                            );
                            //return '';
                        }
                    },
                    {
                        // Actions
                        targets: 5,
                        title: 'Actions',
                        searchable: false,
                        orderable: false,
                        render: function (data, type, full, meta) {
                            return (
                            '<div class="d-flex align-items-center">' +
                            '<a href="' +
                            userView +
                            '" class="btn btn-sm btn-icon"><i class="ti ti-eye"></i></a>' +
                            '<button class="btn btn-sm btn-icon me-2 edit-btn" '+'data-id="' + full.id + '" '+'data-name="' + full.name + '" '+'data-description="' + full.description + '" ' +' data-bs-target="#editPermissionModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="ti ti-edit"></i></button>'+
                            '<a href="javascript:;" class="text-body delete-btn" '+'data-id="' + full.id + '" '+'data-name="' + full + '"'+'><i class="ti ti-trash ti-sm mx-2"></i></a>' +
                            '<a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a>' +
                            '<div class="dropdown-menu dropdown-menu-end m-0">' +
                            '<a href="javascript:;"" class="dropdown-item">Edit</a>' +
                            '<a href="javascript:;" class="dropdown-item">Suspend</a>' +
                            '</div>' +
                            '</div>'
                            );
                        }
                    }
                ],
                order: [[1, 'desc']],
                dom:
                    /* '<"row mx-2"' +
                    '<"col-sm-12 col-md-4 col-lg-6" l>' +
                    '<"col-sm-12 col-md-8 col-lg-6"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end justify-content-center align-items-center flex-sm-nowrap flex-wrap me-1"<"me-3"f><"user_role w-px-200 pb-3 pb-sm-0"><"me-3">B>>' +
                    '>t' +
                    '<"row mx-2"' +
                    '<"col-sm-12 col-md-6"i>' +
                    '<"col-sm-12 col-md-6"p>' +
                    '>', */
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
                buttons: [
                    {
                        text: 'Agregar Rol',
                        className: 'add-new btn btn-primary mb-3 mb-md-0 waves-effect waves-light',
                        attr: {
                            'data-bs-toggle': 'modal',
                            'data-bs-target': '#addRoleModal'
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
                        return 'Details of ' + data['full_name'];
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
                    .columns(2)
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
                }
            });
        }
        // Delete Record
        $('.datatables-users tbody').on('click', '.delete-record', function () {
            dtUser.row($(this).parents('tr')).remove().draw();
        });

        // Filter form control to default size
        // ? setTimeout used for multilingual table initialization
        setTimeout(() => {
            $('.dataTables_filter .form-control').removeClass('form-control-sm');
            $('.dataTables_length .form-select').removeClass('form-select-sm');
        }, 300);
    });

    (function () {
        // On edit role click, update text
        var roleEditList = document.querySelectorAll('.role-edit-modal'),
            roleAdd = document.querySelector('.add-new-role'),
            roleTitle = document.querySelector('.role-title');

        roleAdd.onclick = function () {
            $('#addRoleModal input[name="id"]').val('');
            $('#addRoleModal input[name="name"]').val('');
            roleTitle.innerHTML = 'Agregar Nuevo Rol'; // reset text
        };
        if (roleEditList) {
            roleEditList.forEach(function (roleEditEl) {
                roleEditEl.onclick = function () {
                    var id = $(this).data('id');
                    var name = $(this).data('name');
                    roleTitle.innerHTML = 'Editar Rol'; // reset text
                    $('#addRoleModal input[name="id"]').val(id);
                    $('#addRoleModal input[name="name"]').val(name);
                };
            });
        }
    })();

    $(document).on('click', '.delete-btn', function () {

        var id = $(this).data('id');
        var permission = $(this).data('name');

        Swal.fire({
            title: 'Estas seguro?',
            text: "No podrás revertir el rol!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, Eliminar rol!',
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
                    url: `/roles/${id}`, // Endpoint de tu API
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
                            text: 'Rol eliminado correctamente.',
                            customClass: {
                            confirmButton: 'btn btn-success waves-effect waves-light'
                            }
                        }).then(() => {
                            // Recarga la tabla o realiza otras acciones necesarias
                            $('.datatables-users').DataTable().ajax.reload();
                        });
                    },
                    error: function (xhr) {
                        console.log(xhr);
                        // Manejar errores de la llamada AJAX
                        Swal.fire({
                            title: 'Error',
                            text: 'No se pudo eliminar el rol. Por favor, inténtelo de nuevo.',
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
