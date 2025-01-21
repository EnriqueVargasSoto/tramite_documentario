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
    <h4 class="mb-4">Roles List</h4>

    <p class="mb-4">
      A role provided access to predefined menus and features so that depending on <br />
      assigned role an administrator can have access to what user needs.
    </p>
    <!-- Role cards -->
    <div class="row g-4">
      <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <h6 class="fw-normal mb-2">Total 4 users</h6>
              <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                <li
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
                </li>
              </ul>
            </div>
            <div class="d-flex justify-content-between align-items-end mt-1">
              <div class="role-heading">
                <h4 class="mb-1">Administrator</h4>
                <a
                  href="javascript:;"
                  data-bs-toggle="modal"
                  data-bs-target="#addRoleModal"
                  class="role-edit-modal"
                  ><span>Edit Role</span></a
                >
              </div>
              <a href="javascript:void(0);" class="text-muted"><i class="ti ti-copy ti-md"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <h6 class="fw-normal mb-2">Total 7 users</h6>
              <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  title="Jimmy Ressula"
                  class="avatar avatar-sm pull-up">
                  <img class="rounded-circle" src="../../assets/img/avatars/4.png" alt="Avatar" />
                </li>
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  title="John Doe"
                  class="avatar avatar-sm pull-up">
                  <img class="rounded-circle" src="../../assets/img/avatars/1.png" alt="Avatar" />
                </li>
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  title="Kristi Lawker"
                  class="avatar avatar-sm pull-up">
                  <img class="rounded-circle" src="../../assets/img/avatars/2.png" alt="Avatar" />
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
                  title="Danny Paul"
                  class="avatar avatar-sm pull-up">
                  <img class="rounded-circle" src="../../assets/img/avatars/7.png" alt="Avatar" />
                </li>
              </ul>
            </div>
            <div class="d-flex justify-content-between align-items-end mt-1">
              <div class="role-heading">
                <h4 class="mb-1">Manager</h4>
                <a
                  href="javascript:;"
                  data-bs-toggle="modal"
                  data-bs-target="#addRoleModal"
                  class="role-edit-modal"
                  ><span>Edit Role</span></a
                >
              </div>
              <a href="javascript:void(0);" class="text-muted"><i class="ti ti-copy ti-md"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <h6 class="fw-normal mb-2">Total 5 users</h6>
              <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  title="Andrew Tye"
                  class="avatar avatar-sm pull-up">
                  <img class="rounded-circle" src="../../assets/img/avatars/6.png" alt="Avatar" />
                </li>
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  title="Rishi Swaat"
                  class="avatar avatar-sm pull-up">
                  <img class="rounded-circle" src="../../assets/img/avatars/9.png" alt="Avatar" />
                </li>
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  title="Rossie Kim"
                  class="avatar avatar-sm pull-up">
                  <img class="rounded-circle" src="../../assets/img/avatars/12.png" alt="Avatar" />
                </li>
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  title="Kim Merchent"
                  class="avatar avatar-sm pull-up">
                  <img class="rounded-circle" src="../../assets/img/avatars/10.png" alt="Avatar" />
                </li>
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  title="Sam D'souza"
                  class="avatar avatar-sm pull-up">
                  <img class="rounded-circle" src="../../assets/img/avatars/13.png" alt="Avatar" />
                </li>
              </ul>
            </div>
            <div class="d-flex justify-content-between align-items-end mt-1">
              <div class="role-heading">
                <h4 class="mb-1">Users</h4>
                <a
                  href="javascript:;"
                  data-bs-toggle="modal"
                  data-bs-target="#addRoleModal"
                  class="role-edit-modal"
                  ><span>Edit Role</span></a
                >
              </div>
              <a href="javascript:void(0);" class="text-muted"><i class="ti ti-copy ti-md"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <h6 class="fw-normal mb-2">Total 3 users</h6>
              <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  title="Kim Karlos"
                  class="avatar avatar-sm pull-up">
                  <img class="rounded-circle" src="../../assets/img/avatars/3.png" alt="Avatar" />
                </li>
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  title="Katy Turner"
                  class="avatar avatar-sm pull-up">
                  <img class="rounded-circle" src="../../assets/img/avatars/9.png" alt="Avatar" />
                </li>
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  title="Peter Adward"
                  class="avatar avatar-sm pull-up">
                  <img class="rounded-circle" src="../../assets/img/avatars/4.png" alt="Avatar" />
                </li>
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  title="Kaith D'souza"
                  class="avatar avatar-sm pull-up">
                  <img class="rounded-circle" src="../../assets/img/avatars/10.png" alt="Avatar" />
                </li>
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  title="John Parker"
                  class="avatar avatar-sm pull-up">
                  <img class="rounded-circle" src="../../assets/img/avatars/11.png" alt="Avatar" />
                </li>
              </ul>
            </div>
            <div class="d-flex justify-content-between align-items-end mt-1">
              <div class="role-heading">
                <h4 class="mb-1">Support</h4>
                <a
                  href="javascript:;"
                  data-bs-toggle="modal"
                  data-bs-target="#addRoleModal"
                  class="role-edit-modal"
                  ><span>Edit Role</span></a
                >
              </div>
              <a href="javascript:void(0);" class="text-muted"><i class="ti ti-copy ti-md"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <h6 class="fw-normal mb-2">Total 2 users</h6>
              <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  title="Kim Merchent"
                  class="avatar avatar-sm pull-up">
                  <img class="rounded-circle" src="../../assets/img/avatars/10.png" alt="Avatar" />
                </li>
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  title="Sam D'souza"
                  class="avatar avatar-sm pull-up">
                  <img class="rounded-circle" src="../../assets/img/avatars/13.png" alt="Avatar" />
                </li>
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  title="Nurvi Karlos"
                  class="avatar avatar-sm pull-up">
                  <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="Avatar" />
                </li>
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  title="Andrew Tye"
                  class="avatar avatar-sm pull-up">
                  <img class="rounded-circle" src="../../assets/img/avatars/8.png" alt="Avatar" />
                </li>
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  title="Rossie Kim"
                  class="avatar avatar-sm pull-up">
                  <img class="rounded-circle" src="../../assets/img/avatars/9.png" alt="Avatar" />
                </li>
              </ul>
            </div>
            <div class="d-flex justify-content-between align-items-end mt-1">
              <div class="role-heading">
                <h4 class="mb-1">Restricted User</h4>
                <a
                  href="javascript:;"
                  data-bs-toggle="modal"
                  data-bs-target="#addRoleModal"
                  class="role-edit-modal"
                  ><span>Edit Role</span></a
                >
              </div>
              <a href="javascript:void(0);" class="text-muted"><i class="ti ti-copy ti-md"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="card h-100">
          <div class="row h-100">
            <div class="col-sm-5">
              <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                <img
                  src="../../assets/img/illustrations/add-new-roles.png"
                  class="img-fluid mt-sm-4 mt-md-0"
                  alt="add-new-roles"
                  width="83" />
              </div>
            </div>
            <div class="col-sm-7">
              <div class="card-body text-sm-end text-center ps-sm-0">
                <button
                  data-bs-target="#addRoleModal"
                  data-bs-toggle="modal"
                  class="btn btn-primary mb-2 text-nowrap add-new-role">
                  Add New Role
                </button>
                <p class="mb-0 mt-1">Add role, if it does not exist</p>
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
                  <th>User</th>
                  <th>Role</th>
                  <th>Plan</th>
                  <th>Billing</th>
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
              <h3 class="role-title mb-2">Add New Role</h3>
              <p class="text-muted">Set role permissions</p>
            </div>
            <!-- Add role form -->
            <form id="addRoleForm" class="row g-3" onsubmit="return false">
              <div class="col-12 mb-4">
                <label class="form-label" for="modalRoleName">Role Name</label>
                <input
                  type="text"
                  id="modalRoleName"
                  name="modalRoleName"
                  class="form-control"
                  placeholder="Enter a role name"
                  tabindex="-1" />
              </div>
              <div class="col-12">
                <h5>Role Permissions</h5>
                <!-- Permission table -->
                <div class="table-responsive">
                  <table class="table table-flush-spacing">
                    <tbody>
                      <tr>
                        <td class="text-nowrap fw-medium">
                          Administrator Access
                          <i
                            class="ti ti-info-circle"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Allows a full access to the system"></i>
                        </td>
                        <td>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="selectAll" />
                            <label class="form-check-label" for="selectAll"> Select All </label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-nowrap fw-medium">User Management</td>
                        <td>
                          <div class="d-flex">
                            <div class="form-check me-3 me-lg-5">
                              <input class="form-check-input" type="checkbox" id="userManagementRead" />
                              <label class="form-check-label" for="userManagementRead"> Read </label>
                            </div>
                            <div class="form-check me-3 me-lg-5">
                              <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                              <label class="form-check-label" for="userManagementWrite"> Write </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                              <label class="form-check-label" for="userManagementCreate"> Create </label>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-nowrap fw-medium">Content Management</td>
                        <td>
                          <div class="d-flex">
                            <div class="form-check me-3 me-lg-5">
                              <input class="form-check-input" type="checkbox" id="contentManagementRead" />
                              <label class="form-check-label" for="contentManagementRead"> Read </label>
                            </div>
                            <div class="form-check me-3 me-lg-5">
                              <input class="form-check-input" type="checkbox" id="contentManagementWrite" />
                              <label class="form-check-label" for="contentManagementWrite"> Write </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="contentManagementCreate" />
                              <label class="form-check-label" for="contentManagementCreate"> Create </label>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-nowrap fw-medium">Disputes Management</td>
                        <td>
                          <div class="d-flex">
                            <div class="form-check me-3 me-lg-5">
                              <input class="form-check-input" type="checkbox" id="dispManagementRead" />
                              <label class="form-check-label" for="dispManagementRead"> Read </label>
                            </div>
                            <div class="form-check me-3 me-lg-5">
                              <input class="form-check-input" type="checkbox" id="dispManagementWrite" />
                              <label class="form-check-label" for="dispManagementWrite"> Write </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="dispManagementCreate" />
                              <label class="form-check-label" for="dispManagementCreate"> Create </label>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-nowrap fw-medium">Database Management</td>
                        <td>
                          <div class="d-flex">
                            <div class="form-check me-3 me-lg-5">
                              <input class="form-check-input" type="checkbox" id="dbManagementRead" />
                              <label class="form-check-label" for="dbManagementRead"> Read </label>
                            </div>
                            <div class="form-check me-3 me-lg-5">
                              <input class="form-check-input" type="checkbox" id="dbManagementWrite" />
                              <label class="form-check-label" for="dbManagementWrite"> Write </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="dbManagementCreate" />
                              <label class="form-check-label" for="dbManagementCreate"> Create </label>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-nowrap fw-medium">Financial Management</td>
                        <td>
                          <div class="d-flex">
                            <div class="form-check me-3 me-lg-5">
                              <input class="form-check-input" type="checkbox" id="finManagementRead" />
                              <label class="form-check-label" for="finManagementRead"> Read </label>
                            </div>
                            <div class="form-check me-3 me-lg-5">
                              <input class="form-check-input" type="checkbox" id="finManagementWrite" />
                              <label class="form-check-label" for="finManagementWrite"> Write </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="finManagementCreate" />
                              <label class="form-check-label" for="finManagementCreate"> Create </label>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-nowrap fw-medium">Reporting</td>
                        <td>
                          <div class="d-flex">
                            <div class="form-check me-3 me-lg-5">
                              <input class="form-check-input" type="checkbox" id="reportingRead" />
                              <label class="form-check-label" for="reportingRead"> Read </label>
                            </div>
                            <div class="form-check me-3 me-lg-5">
                              <input class="form-check-input" type="checkbox" id="reportingWrite" />
                              <label class="form-check-label" for="reportingWrite"> Write </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="reportingCreate" />
                              <label class="form-check-label" for="reportingCreate"> Create </label>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-nowrap fw-medium">API Control</td>
                        <td>
                          <div class="d-flex">
                            <div class="form-check me-3 me-lg-5">
                              <input class="form-check-input" type="checkbox" id="apiRead" />
                              <label class="form-check-label" for="apiRead"> Read </label>
                            </div>
                            <div class="form-check me-3 me-lg-5">
                              <input class="form-check-input" type="checkbox" id="apiWrite" />
                              <label class="form-check-label" for="apiWrite"> Write </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="apiCreate" />
                              <label class="form-check-label" for="apiCreate"> Create </label>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-nowrap fw-medium">Repository Management</td>
                        <td>
                          <div class="d-flex">
                            <div class="form-check me-3 me-lg-5">
                              <input class="form-check-input" type="checkbox" id="repoRead" />
                              <label class="form-check-label" for="repoRead"> Read </label>
                            </div>
                            <div class="form-check me-3 me-lg-5">
                              <input class="form-check-input" type="checkbox" id="repoWrite" />
                              <label class="form-check-label" for="repoWrite"> Write </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="repoCreate" />
                              <label class="form-check-label" for="repoCreate"> Create </label>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-nowrap fw-medium">Payroll</td>
                        <td>
                          <div class="d-flex">
                            <div class="form-check me-3 me-lg-5">
                              <input class="form-check-input" type="checkbox" id="payrollRead" />
                              <label class="form-check-label" for="payrollRead"> Read </label>
                            </div>
                            <div class="form-check me-3 me-lg-5">
                              <input class="form-check-input" type="checkbox" id="payrollWrite" />
                              <label class="form-check-label" for="payrollWrite"> Write </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="payrollCreate" />
                              <label class="form-check-label" for="payrollCreate"> Create </label>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- Permission table -->
              </div>
              <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                <button
                  type="reset"
                  class="btn btn-label-secondary"
                  data-bs-dismiss="modal"
                  aria-label="Close">
                  Cancel
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
<script src="{{asset('assets/js/app-access-roles.js')}}"></script>
<script src="{{asset('assets/js/modal-add-role.js')}}"></script>{{--
<script src="{{asset('assets/js/modal-edit-permission.js')}}"></script> --}}

<script>
    $(function() {
  'use strict';

  var dt_basic_table = $('.datatables-users');

  // DataTable with buttons
  // --------------------------------------------------------------------

  /* if (dt_basic_table.length) {
    dt_basic = dt_basic_table.DataTable({
      ajax: assetsPath + 'json/table-datatable.json',
      columns: [
        { data: '' },
        { data: 'id' },
        { data: 'id' },
        { data: 'full_name' },
        { data: 'email' },
        { data: 'start_date' },
        { data: 'salary' },
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
          // For Checkboxes
          targets: 1,
          orderable: false,
          searchable: false,
          responsivePriority: 3,
          checkboxes: true,
          render: function () {
            return '<input type="checkbox" class="dt-checkboxes form-check-input">';
          },
          checkboxes: {
            selectAllRender: '<input type="checkbox" class="form-check-input">'
          }
        },
        {
          targets: 2,
          searchable: false,
          visible: false
        },
        {
          // Avatar image/badge, Name and post
          targets: 3,
          responsivePriority: 4,
          render: function (data, type, full, meta) {
            var $user_img = full['avatar'],
              $name = full['full_name'],
              $post = full['post'];
            if ($user_img) {
              // For Avatar image
              var $output =
                '<img src="' + assetsPath + 'img/avatars/' + $user_img + '" alt="Avatar" class="rounded-circle">';
            } else {
              // For Avatar badge
              var stateNum = Math.floor(Math.random() * 6);
              var states = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'];
              var $state = states[stateNum],
                $name = full['full_name'],
                $initials = $name.match(/\b\w/g) || [];
              $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
              $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
            }
            // Creates full output for row
            var $row_output =
              '<div class="d-flex justify-content-start align-items-center user-name">' +
              '<div class="avatar-wrapper">' +
              '<div class="avatar me-2">' +
              $output +
              '</div>' +
              '</div>' +
              '<div class="d-flex flex-column">' +
              '<span class="emp_name text-truncate">' +
              $name +
              '</span>' +
              '<small class="emp_post text-truncate text-muted">' +
              $post +
              '</small>' +
              '</div>' +
              '</div>';
            return $row_output;
          }
        },
        {
          responsivePriority: 1,
          targets: 4
        },
        {
          // Label
          targets: -2,
          render: function (data, type, full, meta) {
            var $status_number = full['status'];
            var $status = {
              1: { title: 'Current', class: 'bg-label-primary' },
              2: { title: 'Professional', class: ' bg-label-success' },
              3: { title: 'Rejected', class: ' bg-label-danger' },
              4: { title: 'Resigned', class: ' bg-label-warning' },
              5: { title: 'Applied', class: ' bg-label-info' }
            };
            if (typeof $status[$status_number] === 'undefined') {
              return data;
            }
            return (
              '<span class="badge ' + $status[$status_number].class + '">' + $status[$status_number].title + '</span>'
            );
          }
        },
        {
          // Actions
          targets: -1,
          title: 'Actions',
          orderable: false,
          searchable: false,
          render: function (data, type, full, meta) {
            return (
              '<div class="d-inline-block">' +
              '<a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>' +
              '<ul class="dropdown-menu dropdown-menu-end m-0">' +
              '<li><a href="javascript:;" class="dropdown-item">Details</a></li>' +
              '<li><a href="javascript:;" class="dropdown-item">Archive</a></li>' +
              '<div class="dropdown-divider"></div>' +
              '<li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li>' +
              '</ul>' +
              '</div>' +
              '<a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>'
            );
          }
        }
      ],
      order: [[2, 'desc']],
      dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 7,
      lengthMenu: [7, 10, 25, 50, 75, 100],
      buttons: [
        {
          extend: 'collection',
          className: 'btn btn-label-primary dropdown-toggle me-2',
          text: '<i class="ti ti-file-export me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span>',
          buttons: [
            {
              extend: 'print',
              text: '<i class="ti ti-printer me-1" ></i>Print',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            },
            {
              extend: 'csv',
              text: '<i class="ti ti-file-text me-1" ></i>Csv',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            },
            {
              extend: 'pdf',
              text: '<i class="ti ti-file-description me-1"></i>Pdf',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            },
            {
              extend: 'copy',
              text: '<i class="ti ti-copy me-1" ></i>Copy',
              className: 'dropdown-item',
              exportOptions: { columns: [3, 4, 5, 6, 7] }
            }
          ]
        },
        {
          text: '<i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New Record</span>',
          className: 'create-new btn btn-primary',
          action: function () {
            $('#addRoleModal').modal('show'); // Muestra el modal
            }
        },

      ],
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
      }
    });
    $('div.head-label').html('<h5 class="card-title mb-0">DataTable with Buttons</h5>');
  } */
});
</script>
@endsection
