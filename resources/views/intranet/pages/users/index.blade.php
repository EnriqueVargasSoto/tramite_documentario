@extends('intranet.layouts.layout')

@section('styles')
<!-- Vendors CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/node-waves/node-waves.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />

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

    <h4 class="mb-4">Usuarios</h4>

    <p class="mb-4">
        Un rol proporcionaba acceso a menús y funciones predefinidos para que, dependiendo de <br />
        rol asignado un administrador puede tener acceso a lo que el usuario necesita.
    </p>
    <div class="row g-4 mb-4">
      <div class="col-sm-6 col-xl-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
              <div class="content-left">
                <span>Session</span>
                <div class="d-flex align-items-center my-2">
                  <h3 class="mb-0 me-2">21,459</h3>
                  <p class="text-success mb-0">(+29%)</p>
                </div>
                <p class="mb-0">Total Users</p>
              </div>
              <div class="avatar">
                <span class="avatar-initial rounded bg-label-primary">
                  <i class="ti ti-user ti-sm"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
              <div class="content-left">
                <span>Paid Users</span>
                <div class="d-flex align-items-center my-2">
                  <h3 class="mb-0 me-2">4,567</h3>
                  <p class="text-success mb-0">(+18%)</p>
                </div>
                <p class="mb-0">Last week analytics</p>
              </div>
              <div class="avatar">
                <span class="avatar-initial rounded bg-label-danger">
                  <i class="ti ti-user-plus ti-sm"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
              <div class="content-left">
                <span>Active Users</span>
                <div class="d-flex align-items-center my-2">
                  <h3 class="mb-0 me-2">19,860</h3>
                  <p class="text-danger mb-0">(-14%)</p>
                </div>
                <p class="mb-0">Last week analytics</p>
              </div>
              <div class="avatar">
                <span class="avatar-initial rounded bg-label-success">
                  <i class="ti ti-user-check ti-sm"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
              <div class="content-left">
                <span>Pending Users</span>
                <div class="d-flex align-items-center my-2">
                  <h3 class="mb-0 me-2">237</h3>
                  <p class="text-success mb-0">(+42%)</p>
                </div>
                <p class="mb-0">Last week analytics</p>
              </div>
              <div class="avatar">
                <span class="avatar-initial rounded bg-label-warning">
                  <i class="ti ti-user-exclamation ti-sm"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Users List Table -->
    <div class="card">
      <div class="card-header border-bottom">
        <h5 class="card-title mb-3">Filtro de Búsqueda</h5>
        <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
          <div class="col-md-6 user_role"></div>
          {{-- <div class="col-md-4 user_plan"></div> --}}
          <div class="col-md-6 user_status"></div>
        </div>
      </div>
      <div class="card-datatable table-responsive">
        <table class="datatables-users table">
          <thead class="border-top">
            <tr>
              <th></th>
              <th>User</th>
              <th>Role</th>
              {{-- <th>Plan</th>
              <th>Billing</th> --}}
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
        </table>
      </div>
      <!-- Offcanvas to add new user -->
      <div
        class="offcanvas offcanvas-end"
        tabindex="-1"
        id="offcanvasAddUser"
        aria-labelledby="offcanvasAddUserLabel">
        <div class="offcanvas-header">
          <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Agregar Nuevo Usuario</h5>
          <button
            type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        </div>
        <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
          <form class="add-new-user pt-0" action="{{route('users.store')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="add-user-fullname">Nombres</label>
              <input
                type="text"
                class="form-control"
                id="add-user-fullname"
                placeholder="Nombres"
                name="name"
                aria-label="John Doe" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-fullname">Apellidos</label>
                <input
                  type="text"
                  class="form-control"
                  id="add-user-fullname"
                  placeholder="Apellidos"
                  name="lastname"
                  aria-label="John Doe" />
              </div>
            <div class="mb-3">
              <label class="form-label" for="add-user-email">Email</label>
              <input
                type="text"
                id="add-user-email"
                class="form-control"
                placeholder="john.doe@example.com"
                aria-label="john.doe@example.com"
                name="email" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-fullname">Contraseña</label>
                <input
                  type="password"
                  class="form-control"
                  id="add-user-fullname"
                  placeholder="Apellidos"
                  name="password"
                  aria-label="***" />
              </div>
            {{-- <div class="mb-3">
              <label class="form-label" for="add-user-contact">Contact</label>
              <input
                type="text"
                id="add-user-contact"
                class="form-control phone-mask"
                placeholder="+1 (609) 988-44-11"
                aria-label="john.doe@example.com"
                name="userContact" />
            </div> --}}
            {{-- <div class="mb-3">
              <label class="form-label" for="add-user-company">Company</label>
              <input
                type="text"
                id="add-user-company"
                class="form-control"
                placeholder="Web Developer"
                aria-label="jdoe1"
                name="companyName" />
            </div> --}}
            {{-- <div class="mb-3">
              <label class="form-label" for="country">Country</label>
              <select id="country" class="select2 form-select">
                <option value="">Select</option>
                <option value="Australia">Australia</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Belarus">Belarus</option>
                <option value="Brazil">Brazil</option>
                <option value="Canada">Canada</option>
                <option value="China">China</option>
                <option value="France">France</option>
                <option value="Germany">Germany</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Japan">Japan</option>
                <option value="Korea">Korea, Republic of</option>
                <option value="Mexico">Mexico</option>
                <option value="Philippines">Philippines</option>
                <option value="Russia">Russian Federation</option>
                <option value="South Africa">South Africa</option>
                <option value="Thailand">Thailand</option>
                <option value="Turkey">Turkey</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
              </select>
            </div> --}}
            <div class="mb-3">
              <label class="form-label" for="user-role">Rol de Usuario</label>
              <select id="user-role" class="form-select" name="role_id">
                @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
                {{-- <option value="subscriber">Subscriber</option>
                <option value="editor">Editor</option>
                <option value="maintainer">Maintainer</option>
                <option value="author">Author</option>
                <option value="admin">Admin</option> --}}
              </select>
            </div>
            {{-- <div class="mb-4">
              <label class="form-label" for="user-plan">Select Plan</label>
              <select id="user-plan" class="form-select">
                <option value="basic">Basic</option>
                <option value="enterprise">Enterprise</option>
                <option value="company">Company</option>
                <option value="team">Team</option>
              </select>
            </div> --}}
            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection

@section('scripts')
    <!-- Vendors JS -->
    <script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/form-validation/popular.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/form-validation/bootstrap5.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/form-validation/auto-focus.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>

 <!-- Page JS -->
{{-- <script src="{{asset('assets/js/app-user-list.js')}}"></script> --}}

<script>
    /**
 * Page User List
 */

'use strict';

// Datatable (jquery)
$(function () {
    let borderColor, bodyBg, headingColor;

    if (isDarkStyle) {
        borderColor = config.colors_dark.borderColor;
        bodyBg = config.colors_dark.bodyBg;
        headingColor = config.colors_dark.headingColor;
    } else {
        borderColor = config.colors.borderColor;
        bodyBg = config.colors.bodyBg;
        headingColor = config.colors.headingColor;
    }

    // Variable declaration for table
    var dt_user_table = $('.datatables-users'),
        select2 = $('.select2'),
        userView = 'app-user-view-account.html',
        statusObj = {
            1: { title: 'Activo', class: 'bg-label-warning' },
           // 2: { title: 'Activo', class: 'bg-label-success' },
            0: { title: 'Inactivo', class: 'bg-label-secondary' }
        };

    if (select2.length) {
        var $this = select2;
        $this.wrap('<div class="position-relative"></div>').select2({
            placeholder: 'Select Country',
            dropdownParent: $this.parent()
        });
    }

    var cantRegistros = 10;//dataTablePermissions.DataTable().page.len();
    var apiUrl = 'http://127.0.0.1:8000/api/users';

    // Users datatable
    if (dt_user_table.length) {
        var dt_user = dt_user_table.DataTable({
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
                { data: 'name' },
                { data: 'roles' },
                /* { data: 'current_plan' },
                { data: 'billing' }, */
                { data: 'status' },
                { data: 'action' }
            ],
            columnDefs: [
                {
                    // For Responsive
                    className: 'control',
                    searchable: false,
                    orderable: false,
                    responsivePriority: 2,
                    targets: 0,
                    render: function (data, type, full, meta) {
                        return '';
                    }
                },
                {
                    // User full name and email
                    targets: 1,
                    responsivePriority: 4,
                    render: function (data, type, full, meta) {
                        var $name = full['name'] + full['lastname'],
                        $email = full['email'],
                        $image = full['avatar'];
                        if ($image) {
                            // For Avatar image
                            var $output = '<img src="' + assetsPath + 'img/avatars/' + $image + '" alt="Avatar" class="rounded-circle">';
                        } else {
                            // For Avatar badge
                            var stateNum = Math.floor(Math.random() * 6);
                            var states = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'];
                            var $state = states[stateNum],
                                $name = full['name'],
                                $initials = $name.match(/\b\w/g) || [];
                            $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                            $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
                        }
                        // Creates full output for row
                        var $row_output =
                            '<div class="d-flex justify-content-start align-items-center user-name">' +
                            '<div class="avatar-wrapper">' +
                            '<div class="avatar me-3">' +
                            $output +
                            '</div>' +
                            '</div>' +
                            '<div class="d-flex flex-column">' +
                            '<a href="' +
                            userView +
                            '" class="text-body text-truncate"><span class="fw-medium">' +
                            $name +
                            '</span></a>' +
                            '<small class="text-muted">' +
                            $email +
                            '</small>' +
                            '</div>' +
                            '</div>';
                        return $row_output;
                    }
                },
                {
                    // User Role
                    targets: 2,
                    render: function (data, type, full, meta) {
                        console.log('rol: ',full['roles'][0]['name']);
                        var $role = full['roles'][0]['name'];

                        var roleBadgeObj = {
                            Subscriber:
                                '<span class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2"><i class="ti ti-user ti-sm"></i></span>',
                            Author:
                                '<span class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30 me-2"><i class="ti ti-circle-check ti-sm"></i></span>',
                            Maintainer:
                                '<span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2"><i class="ti ti-chart-pie-2 ti-sm"></i></span>',
                            Editor:
                                '<span class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30 me-2"><i class="ti ti-edit ti-sm"></i></span>',
                            Admin:
                                '<span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30 me-2"><i class="ti ti-device-laptop ti-sm"></i></span>'
                        };
                        //return '';
                        return "<span class='text-truncate d-flex align-items-center'>" + roleBadgeObj[$role] + $role + '</span>';
                    }
                },
                /* {
                    // Plans
                    targets: 3,
                    render: function (data, type, full, meta) {
                        var $plan = full['current_plan'];

                        return '<span class="fw-medium">' + $plan + '</span>';
                        return '';
                    }
                }, */
                {
                    // User Status
                    targets: 3,
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
                    title: 'Actions',
                    searchable: false,
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return (
                            '<div class="d-flex align-items-center">' +
                            '<a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a>' +
                            '<a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a>' +
                            '<a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a>' +
                            '<div class="dropdown-menu dropdown-menu-end m-0">' +
                            '<a href="' +
                            userView +
                            '" class="dropdown-item">View</a>' +
                            '<a href="javascript:;" class="dropdown-item">Suspend</a>' +
                            '</div>' +
                            '</div>'
                        );
                        //return '';
                    }
                }
            ],
            order: [[1, 'desc']],
            dom:
                '<"row me-2"' +
                '<"col-md-2"<"me-3"l>>' +
                '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +
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
                    extend: 'collection',
                    className: 'btn btn-label-secondary dropdown-toggle mx-3 waves-effect waves-light',
                    text: '<i class="ti ti-screen-share me-1 ti-xs"></i>Exportar',
                    buttons: [
                        {
                            extend: 'print',
                            text: '<i class="ti ti-printer me-2" ></i>Imprimir',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5],
                                // prevent avatar to be print
                                format: {
                                body: function (inner, coldex, rowdex) {
                                    if (inner.length <= 0) return inner;
                                    var el = $.parseHTML(inner);
                                    var result = '';
                                    $.each(el, function (index, item) {
                                        if (item.classList !== undefined && item.classList.contains('user-name')) {
                                            result = result + item.lastChild.firstChild.textContent;
                                        } else if (item.innerText === undefined) {
                                            result = result + item.textContent;
                                        } else result = result + item.innerText;
                                    });
                                    return result;
                                }
                                }
                            },
                            customize: function (win) {
                                //customize print view for dark
                                $(win.document.body)
                                .css('color', headingColor)
                                .css('border-color', borderColor)
                                .css('background-color', bodyBg);
                                $(win.document.body)
                                .find('table')
                                .addClass('compact')
                                .css('color', 'inherit')
                                .css('border-color', 'inherit')
                                .css('background-color', 'inherit');
                            }
                        },
                        {
                            extend: 'csv',
                            text: '<i class="ti ti-file-text me-2" ></i>Csv',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5],
                                // prevent avatar to be display
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function (index, item) {
                                            if (item.classList !== undefined && item.classList.contains('user-name')) {
                                                result = result + item.lastChild.firstChild.textContent;
                                            } else if (item.innerText === undefined) {
                                                result = result + item.textContent;
                                            } else result = result + item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            }
                        },
                        {
                            extend: 'excel',
                            text: '<i class="ti ti-file-spreadsheet me-2"></i>Excel',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5],
                                // prevent avatar to be display
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = '';
                                        $.each(el, function (index, item) {
                                            if (item.classList !== undefined && item.classList.contains('user-name')) {
                                                result = result + item.lastChild.firstChild.textContent;
                                            } else if (item.innerText === undefined) {
                                                result = result + item.textContent;
                                            } else result = result + item.innerText;
                                        });
                                        return result;
                                    }
                                }
                            }
                        },
                        {
                            extend: 'pdf',
                            text: '<i class="ti ti-file-code-2 me-2"></i>Pdf',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5],
                                // prevent avatar to be display
                                format: {
                                body: function (inner, coldex, rowdex) {
                                    if (inner.length <= 0) return inner;
                                    var el = $.parseHTML(inner);
                                    var result = '';
                                    $.each(el, function (index, item) {
                                        if (item.classList !== undefined && item.classList.contains('user-name')) {
                                            result = result + item.lastChild.firstChild.textContent;
                                        } else if (item.innerText === undefined) {
                                            result = result + item.textContent;
                                        } else result = result + item.innerText;
                                    });
                                    return result;
                                }
                                }
                            }
                        },
                        {
                            extend: 'copy',
                            text: '<i class="ti ti-copy me-2" ></i>Copiar',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5],
                                // prevent avatar to be display
                                format: {
                                body: function (inner, coldex, rowdex) {
                                    if (inner.length <= 0) return inner;
                                    var el = $.parseHTML(inner);
                                    var result = '';
                                    $.each(el, function (index, item) {
                                        if (item.classList !== undefined && item.classList.contains('user-name')) {
                                            result = result + item.lastChild.firstChild.textContent;
                                        } else if (item.innerText === undefined) {
                                            result = result + item.textContent;
                                        } else result = result + item.innerText;
                                    });
                                    return result;
                                }
                                }
                            }
                        }
                    ]
                },
                {
                    text: '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Agregar Usuario</span>',
                    className: 'add-new btn btn-primary waves-effect waves-light',
                    attr: {
                        'data-bs-toggle': 'offcanvas',
                        'data-bs-target': '#offcanvasAddUser'
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
                    '<select id="UserRole" class="form-select text-capitalize"><option value=""> Seleccionar Rol </option></select>'
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
                        console.log('d: ',d[0]['name']);
                        select.append('<option value="' + d[0]['name'] + '">' + d[0]['name'] + '</option>');
                    });
                });
                // Adding plan filter once table initialized
                /* this.api()
                .columns(3)
                .every(function () {
                    var column = this;
                    var select = $(
                    '<select id="UserPlan" class="form-select text-capitalize"><option value=""> Select Plan </option></select>'
                    )
                    .appendTo('.user_plan')
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                    });

                    column
                    .data()
                    .unique()
                    .sort()
                    .each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>');
                    });
                }); */
                // Adding status filter once table initialized
                this.api()
                .columns(5)
                .every(function () {
                    var column = this;
                    var select = $(
                    '<select id="FilterTransaction" class="form-select text-capitalize"><option value=""> Select Estado </option></select>'
                    )
                    .appendTo('.user_status')
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                    });
                    console.log('column: ',column.data());
                    column
                    .data()
                    .unique()
                    .sort()
                    .each(function (d, j) {
                        console.log('d: ',d);
                        select.append(
                        '<option value="' +
                            statusObj[d].title +
                            '" class="text-capitalize">' +
                            statusObj[d].title +
                            '</option>'
                        );
                    });
                });
            }
        });
    }

  // Delete Record
  $('.datatables-users tbody').on('click', '.delete-record', function () {
    dt_user.row($(this).parents('tr')).remove().draw();
  });

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
});
</script>
@endsection
