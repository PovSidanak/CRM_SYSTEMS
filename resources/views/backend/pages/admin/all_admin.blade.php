@extends('admin.admin_dashboard')
@section('admin')
    <style>
        .pagination {
            --bs-pagination-disabled-bg: aliceblue;
        }

        .page-breadcrumb .breadcrumb {
            background: aliceblue;
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
            <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#varyingModal"
                data-bs-whatever="@mdo">
                <i class="btn-icon-prepend" data-feather="plus"></i>Add User
            </button>
        </div>
        <br>


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card" style="background-color: aliceblue; border:none;">
                    <div class="card-body">
                        <h6 class="card-title" style="color: black;">User All</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th style="color: gray;">ID</th>
                                        <th style="color: gray;">Image</th>
                                        <th style="color: gray;">Name</th>
                                        <th style="color: gray;">Email</th>
                                        <th style="color: gray;">Phone</th>
                                        <th style="color: gray;">Role</th>
                                        <th style="color: gray;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alladmin as $key => $item)
                                        <tr>
                                            <td style="color: black;">{{ $key + 1 }}</td>
                                            <td><img
                                                    src="{{ !empty($item->photo) ? url('upload/admin_images/' . $item->photo) : url('upload/no_image.jpg') }}">
                                            </td>
                                            <td style="color: black;">{{ $item->name }}</td>
                                            <td style="color: black;">{{ $item->email }}</td>
                                            <td style="color: black;">{{ $item->phone }}</td>
                                            <td>
                                                @foreach ($item->roles as $role)
                                                    <span class="badge badge-pill bg-danger">{{ $role->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-inverse-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}" title="Edit"><i data-feather="edit"></i></button>
                                                <a href="{{ route('delete.admin', $item->id) }}" id="delete" class="btn btn-inverse-danger" title="Delete"><i data-feather="trash-2"></i></a>
                                            </td>
                                        </tr>
                                        {{-- Edit form --}}
                                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="background-color: aliceblue;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Edit User</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="myForm" method="POST" action="{{ route('update.admin', $item->id) }}" class="forms-sample">
                                                            @csrf
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label" style="color:gray;">User Name <span>*</span></label>
                                                                <input type="text" style="background-color: aliceblue;color:black" name="username" class="form-control" value="{{ $item->username }}" required>
                                                            </div>

                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label" style="color:gray;">Name <span>*</span></label>
                                                                <input type="text" style="background-color: aliceblue;color:black" name="name" class="form-control" value="{{ $item->name }}" required>
                                                            </div>

                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label" style="color:gray;">Email<span>*</span></label>
                                                                <input type="email" style="background-color: aliceblue;color:black" name="email" class="form-control" value="{{ $item->email }}" required>
                                                            </div>

                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label" style="color:gray;">Phone<span>*</span></label>
                                                                <input type="text" style="background-color: aliceblue;color:black" name="phone" class="form-control" value="{{ $item->phone }}" required>
                                                            </div>

                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label" style="color:gray;">Address<span>*</span></label>
                                                                <input type="text" style="background-color: aliceblue;color:black" name="address" class="form-control" value="{{ $item->address }}" required>
                                                            </div>

                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label" style="color:gray;">Role Name <span>*</span></label>
                                                                <select name="roles" style="background-color: aliceblue;color:black"class="form-select" id="exampleFormControlSelect1" required>
                                                                    <option selected="" disabled="">Select Role</option>
                                                                    @foreach ($roles as $role)
                                                                        <option value="{{ $role->id }}"
                                                                            {{ $item->hasRole($role->name) ? 'selected' : '' }}>
                                                                            {{ $role->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <button type="submit"
                                                                class="btn btn-primary me-2">Save</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End Edit Form --}}
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
                    <h5 class="modal-title" id="varyingModalLabel" style="color: black;">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="myForm" method="POST" action="{{ route('store.admin') }}" class="forms-sample">
                        @csrf
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" style="color: gray;" class="form-label">User Name <span>*</span></label>
                            <input type="text" style="background-color: aliceblue; color:black" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" style="color: gray;" class="form-label"> Name<span>*</span></label>
                            <input type="text" style="background-color: aliceblue; color:black" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" style="color: gray;" class="form-label"> Email <span>*</span></label>
                            <input type="email" style="background-color: aliceblue; color:black" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" style="color: gray;" class="form-label">Phone <span>*</span></label>
                            <input type="text" style="background-color: aliceblue; color:black" name="phone" class="form-control" required>
                        </div>

                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" style="color: gray;" class="form-label">Address<span>*</span></label>
                            <input type="text" style="background-color: aliceblue; color:black" name="address" class="form-control" required>
                        </div>

                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" style="color: gray;" class="form-label">Password <span>*</span></label>
                            <input type="password" style="background-color:aliceblue; color:black;" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" style="color: gray;" class="form-label">Role Name <span>*</span></label>
                            <select name="roles" style="background-color: aliceblue; color:black" class="form-select" id="exampleFormControlSelect1" required>
                                <option selected="" disabled="">Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Save</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
