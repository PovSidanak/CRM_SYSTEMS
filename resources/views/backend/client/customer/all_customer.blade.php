@extends('admin.admin_dashboard')
@section('admin')
    <style>
        .page-breadcrumb .breadcrumb {
            background: aliceblue;
        }

        .pagination {
            --bs-pagination-disabled-bg: aliceblue;
        }

        .form-select {
            background-color: aliceblue;
        }

        .form-control {
            background-color: aliceblue !important;
            color: black !important;
        }

        .dataTables_length {
            color: black;
        }

        .dataTables_info {
            color: black;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px aliceblue inset;
            -webkit-text-fill-color: black;
        }

        .dataTables_length select {
            color: black;
        }

        .page-link {
            background-color: white;
        }

        .page-link:hover {
            background-color: aliceblue;
        }
    </style>
    <style>
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            background-color: aliceblue;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px aliceblue inset;
            -webkit-text-fill-color: black;
        }

        label>span {
            color: red;
            margin-left: 3px;

        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content" style="background-color: aliceblue;">

        <div>
            @if (Auth::user()->can('add.customer'))
                <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal"
                    data-bs-target="#varyingModal" data-bs-whatever="@mdo">
                    <i class="btn-icon-prepend" data-feather="plus"></i>Add Customer
                </button>
            @endif
        </div>
        <br>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card" style="background-color: aliceblue; border:none;">
                    <div class="card-body">
                        <h6 class="card-title" style="color: black;">Customer All</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th style="color: gray;">ID</th>
                                        <th style="color: gray;">Name</th>
                                        <th style="color: gray;">Email</th>
                                        <th style="color: gray;">Phone Number</th>
                                        <th style="color: gray;">Sold by</th>
                                        <th style="color: gray;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($combine_array as $key => $item)
                                        <tr>
                                            <td style="color: black;">{{ $key + 1 }}</td>
                                            <td style="color: black;">{{ $item->name }}</td>
                                            <td style="color: black;">{{ $item->email }}</td>
                                            <td style="color: black;">{{ $item->phone }}</td>
                                            <td style="color: black;">{{ $item->name_user }}</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-success"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal" title="Edit"><i
                                                        data-feather="eye"></i>
                                                </button>
                                                @if (Auth::user()->can('edit.customer'))
                                                    {{-- <a href="{{ route('edit.customers', $item->id) }}"
                                                        class="btn btn-outline-warning" title="Edit">
                                                        <i data-feather="edit"></i></a> --}}
                                                    <button type="button" class="btn btn-outline-warning"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#varyingModal1{{ $item->id }}"
                                                        data-bs-whatever="@mdo" title="Edit"><i
                                                            data-feather="edit"></i></button>
                                                @endif
                                                @if (Auth::user()->can('delete.customer'))
                                                    <a href="{{ route('delete.customers', $item->id) }}" id="delete"
                                                        class="btn btn-outline-danger" title="Delete"><i
                                                            data-feather="trash-2"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        {{-- View Detail --}}
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="background-color: aliceblue;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"
                                                            style="color: black;">View Customer Detail</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="btn-close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Default dropright button -->
                                                        <div class="btn-group dropend"
                                                            style="position: absolute; left:430px">
                                                            <button type="button" class="btn btn-primary "
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i data-feather="align-justify"></i>
                                                            </button>
                                                            <div class="dropdown-menu"
                                                                style="background-color: aliceblue; border:none;box-shadow: 1  10px 0 #8e9093;">
                                                                <a class="dropdown-item" style="color: black;"
                                                                    href="{{ route('all.customerservice') }}">List
                                                                    Services</a>
                                                                <a class="dropdown-item" style="color: black;"
                                                                    href="{{ route('all.customercalls') }}">List Call</a>
                                                                <a class="dropdown-item" style="color: black;"
                                                                    href="{{ route('all.appointments') }}">List
                                                                    Appointment</a>
                                                                <a class="dropdown-item" style="color: black;"
                                                                    href="{{ route('all.quotations') }}">List Quotation</a>
                                                                <a class="dropdown-item" style="color: black;"
                                                                    href="{{ route('all.documents') }}">List Document</a>

                                                            </div>

                                                        </div>
                                                        <div class="mb-3" style="align-content: center;">
                                                            <img class="wd-80 ht-80 rounded-circle"
                                                                src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/admin_images/boy.jpg') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="mb-3 form-group">
                                                            <label for="exampleInputEmail1" class="form-label"
                                                                style="color: gray;">Company Name
                                                                <span>*</span></label>
                                                            <input type="text"
                                                                style="background-color: aliceblue;color:black"
                                                                name="name" class="form-control"
                                                                value="{{ $item->name }}">
                                                        </div>
                                                        <div class="mb-3 form-group">
                                                            <label for="exampleInputEmail1" class="form-label"
                                                                style="color: gray;">Email
                                                                <span>*</span></label>
                                                            <input type="text"
                                                                style="background-color: aliceblue;color:black"
                                                                name="email" class="form-control"
                                                                value="{{ $item->email }}">
                                                        </div>
                                                        <div class="mb-3 form-group">
                                                            <label for="exampleInputEmail1" class="form-label"
                                                                style="color: gray;">Phone Number
                                                                <span>*</span></label>
                                                            <input type="text"
                                                                style="background-color: aliceblue;color:black"
                                                                name="phone" class="form-control"
                                                                value="{{ $item->phone }}">
                                                        </div>
                                                        <div class="mb-3 form-group">
                                                            <label for="exampleInputEmail1" class="form-label"
                                                                style="color: gray;">Address
                                                                <span>*</span></label>
                                                            <input type="text"
                                                                style="background-color: aliceblue;color:black"
                                                                name="address" class="form-control"
                                                                value="{{ $item->address }}">
                                                        </div>
                                                        <div class="mb-3 form-group">
                                                            <label for="exampleInputEmail1" class="form-label"
                                                                style="color: gray;">City
                                                                <span>*</span></label>
                                                            <input type="text"
                                                                style="background-color: aliceblue;color:black"
                                                                name="city" class="form-control"
                                                                value="{{ $item->city }}">
                                                        </div>
                                                        <div class="mb-3 form-group">
                                                            <label for="exampleInputEmail1" class="form-label"
                                                                style="color: gray;">Services
                                                                <span>*</span></label>
                                                            <input type="text"
                                                                style="background-color: aliceblue;color:black"
                                                                name="city" class="form-control"
                                                                value="{{ $item->services }}">
                                                        </div>
                                                        <div class="mb-3 form-group">
                                                            <label for="exampleInputEmail1" class="form-label"
                                                                style="color: gray;">Designation
                                                                <span>*</span></label>
                                                            <input type="text"
                                                                style="background-color:aliceblue;color:black"
                                                                name="Designation" class="form-control"
                                                                value="{{ $item->Designation }}">
                                                        </div>
                                                        <div class="mb-3 form-group">
                                                            <label for="exampleInputEmail1" class="form-label"
                                                                style="color: gray;">Sold By
                                                                <span>*</span></label>
                                                            <input type="text"
                                                                style="background-color: aliceblue;color:black"
                                                                class="form-control" value="{{ $item->name_user }}">
                                                        </div>
                                                        <div class="mb-3 form-group">
                                                            <label for="exampleInputEmail1" class="form-label"
                                                                style="color: gray;">Description
                                                                <span>*</span></label>
                                                            <input type="text"
                                                                style="background-color: aliceblue;color:black"
                                                                name="description" class="form-control"
                                                                value="{{ $item->Designation }}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Edit form --}}
                                        <div class="modal fade" id="varyingModal1{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="varyingModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="background-color: aliceblue;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="varyingModalLabel"
                                                            style="color: black;">Edit Customers</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="btn-close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="myForm" method="POST"
                                                            action="{{ route('update.customers', $item->id) }}"
                                                            class="forms-sample">
                                                            @csrf
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label"
                                                                    style="color: gray;">Company Name
                                                                    <span>*</span></label>
                                                                <input type="text"
                                                                    style="background-color: aliceblue; color:black;"
                                                                    name="name" class="form-control"
                                                                    value="{{ $item->name }}" required>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label"
                                                                    style="color: gray;">Email <span>*</span></label>
                                                                <input type="text"
                                                                    style="background-color: aliceblue; color:black;"
                                                                    name="email" class="form-control"
                                                                    value="{{ $item->email }}" required>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label"
                                                                    style="color: gray;">Phone Number
                                                                    <span>*</span></label>
                                                                <input type="text"
                                                                    style="background-color: aliceblue; color:black;"
                                                                    name="phone" class="form-control"
                                                                    value="{{ $item->phone }}" required>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label"
                                                                    style="color: gray;">Address <span>*</span></label>
                                                                <input type="text"
                                                                    style="background-color: aliceblue; color:black;"
                                                                    name="address" class="form-control"
                                                                    value="{{ $item->address }}" required>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label"
                                                                    style="color: gray;">City <span>*</span></label>
                                                                <input type="text"
                                                                    style="background-color: aliceblue; color:black;"
                                                                    name="city" class="form-control"
                                                                    value="{{ $item->city }}" required>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label"style="color: gray;">Services
                                                                    <span>*</span></label>
                                                                <select name="services_id"
                                                                    style="background-color: aliceblue; color:black;"
                                                                    class="form-control" required>
                                                                    <option selected="" disabled="">Select Services
                                                                    </option>
                                                                    @foreach ($services as $service)
                                                                        <option value="{{ $service->id }}">
                                                                            {{ $service->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label"
                                                                    style="color: gray;">Designation <span>*</span></label>
                                                                <input type="text"
                                                                    style="background-color: aliceblue; color:black;"
                                                                    name="Designation" class="form-control"
                                                                    value="{{ $item->name }}">
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label"
                                                                    style="color: gray;">Sold by</label>
                                                                <select name="users_id"
                                                                    style="background-color: aliceblue; color:black;"
                                                                    class="form-control" required>
                                                                    <option selected="" disabled="">Select User
                                                                    </option>
                                                                    @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}">
                                                                            {{ $user->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label"
                                                                    style="color: gray;">Description <span>*</span></label>
                                                                <input type="text"
                                                                    style="background-color: aliceblue; color:black;"
                                                                    name="description" class="form-control"
                                                                    value="{{ $item->description }}" required>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-primary me-2">Save</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Create form --}}
    <div class="modal fade" id="varyingModal" tabindex="-1" aria-labelledby="varyingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: aliceblue;">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel" style="color: black;">Add Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="myForm" method="POST" action="{{ route('store.customers') }}" class="forms-sample">
                        @csrf
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label" style="color: gray;">Company Name
                                <span>*</span></label>
                            <input type="text" style="background-color: aliceblue;color:black" name="name"
                                class="form-control" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label" style="color: gray;">Email
                                <span>*</span></label>
                            <input type="text" style="background-color: aliceblue;color:black" name="email"
                                class="form-control" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label" style="color: gray;">Phone Number
                                <span>*</span></label>
                            <input type="text" style="background-color: aliceblue;color:black" name="phone"
                                class="form-control" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label" style="color: gray;">Address
                                <span>*</span></label>
                            <input type="text" style="background-color: aliceblue;color:black" name="address"
                                class="form-control" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label" style="color: gray;">City
                                <span>*</span></label>
                            <input type="text" style="background-color: aliceblue;color:black" name="city"
                                class="form-control" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label" style="color: gray;">Description
                                <span>*</span></label>
                            <input type="text" style="background-color: aliceblue;color:black" name="description"
                                class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Save</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
