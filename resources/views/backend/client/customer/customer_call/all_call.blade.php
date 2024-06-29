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
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('all.customers') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('all.customercalls') }}">List Call</a></li>

                </ol>
            </nav>
        </div>
        <div>
            <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#varyingModal"
                data-bs-whatever="@mdo">
                <i class="btn-icon-prepend" data-feather="plus"></i>Add Call
            </button>
        </div>
        <br>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card" style="background-color: aliceblue; border:none;">
                    <div class="card-body">
                        <h6 class="card-title" style="color: black;">Customer Call All</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th style="color: gray;">ID</th>
                                        <th style="color: gray;">Date</th>
                                        <th style="color: gray;">Call Type</th>
                                        <th style="color: gray;">Status</th>
                                        <th style="color: gray;">Added By</th>
                                        <th style="color: gray;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($combine_array as $key => $item)
                                        <tr>
                                            <td style="color: black;">{{ $key + 1 }}</td>
                                            <td style="color: black;">{{ date('Y-m-d', strtotime($item->date)) }}</td>
                                            </td>
                                            <td style="color: black;">{{ $item->call_type }}</td>
                                            <td style="color: black;">{{ $item->status }}</td>
                                            <td style="color: black;">{{ $item->name_user }}</td>
                                            <td>
                                                {{-- <a href="{{ route('edit.customercalls',$item->id)}}" class="btn btn-outline-warning" title="Edit"><i data-feather="edit"></i></a> --}}
                                                <button type="button" class="btn btn-outline-warning"
                                                    data-bs-toggle="modal" data-bs-target="#varyingModal{{ $item->id }}"
                                                    data-bs-whatever="@mdo" title="Edit"><i
                                                        data-feather="edit"></i></button>
                                                <a href="{{ route('delete.customercalls', $item->id) }}" id="delete"
                                                    class="btn btn-outline-danger" title="Delete"><i
                                                        data-feather="trash-2"></i></a>
                                            </td>
                                        </tr>
                                        {{-- Edit form --}}
                                        <div class="modal fade" id="varyingModal{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="varyingModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="background-color: aliceblue;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="varyingModalLabel"
                                                            style="color: black;">Edit Customer Call</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="btn-close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="myForm" method="POST"
                                                            action="{{ route('update.customercalls', $item->id) }}"
                                                            class="forms-sample">
                                                            @csrf

                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label"
                                                                    style="color: gray;">date <span>*</span></label>
                                                                <input type="text"
                                                                    style="background-color: aliceblue; color:black;"
                                                                    class="form-control"
                                                                    value="{{ date('Y-m-d', strtotime($item->date)) }}"
                                                                    required>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label class="form-label" style="color: gray;">Call Type
                                                                    <span>*</span></label>
                                                                <select
                                                                    class="js-example-basic-single form-select select2-hidden-accessible"
                                                                    style="background-color: white; color:black;"
                                                                    name="call_type" data-width="100%" data-select2-id="1"
                                                                    tabindex="-1" aria-hidden="true" required>
                                                                    <option value="{{ $item->call_type }}"
                                                                        data-select2-id="13" style="color:black;">
                                                                        {{ $item->call_type }}
                                                                    </option>
                                                                    <option value="Out Going" data-select2-id="13"
                                                                        style="color:black;">Out Going</option>
                                                                    <option value="In Coming" data-select2-id="14"
                                                                        style="color:black;">In Coming</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label class="form-label" style="color: gray;">Status
                                                                    <span>*</span></label>
                                                                <select
                                                                    class="js-example-basic-single form-select select2-hidden-accessible"
                                                                    style="background-color: white; color:black;"
                                                                    name="status" data-width="100%" data-select2-id="1"
                                                                    tabindex="-1" aria-hidden="true" required>
                                                                    <option value="{{ $item->status }}"
                                                                        data-select2-id="13" style="color:black;">
                                                                        {{ $item->status }}</option>
                                                                    <option value="Under Processing" data-select2-id="13"
                                                                        style="color:black;">Under Processing</option>
                                                                    <option value="Finished" data-select2-id="14"
                                                                        style="color:black;">Finished</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label"
                                                                    style="color: gray;">Sold by <span>*</span></label>
                                                                <select name=""
                                                                    style="background-color: aliceblue; color:black;"
                                                                    class="form-control" required>
                                                                    @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}">
                                                                            {{ $user->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-primary me-2">Update</button>
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
                    <h5 class="modal-title" id="varyingModalLabel" style="color: black;">New Call</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="myForm" method="POST" action="{{ route('store.customercalls') }}"
                        class="forms-sample">
                        @csrf

                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label" style="color: gray;">Date
                                <span>*</span></label>
                            <input type="date" name="date" class="form-control"
                                style="color: black;background-color:aliceblue" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label" style="color: gray;">Call Type <span>*</span></label>
                            <select class="js-example-basic-single form-select select2-hidden-accessible"
                                style="color:black;" name="call_type" data-width="100%" data-select2-id="1"
                                tabindex="-1" aria-hidden="true" required>
                                <option value="" data-select2-id="13" style="color:black;">Select Call Type
                                </option>
                                <option value="Out Going" data-select2-id="13" style="color:black;">Out Going</option>
                                <option value="In Coming" data-select2-id="14" style="color:black;">In Coming</option>
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label" style="color: gray;">Status <span>*</span></label>
                            <select class="js-example-basic-single form-select select2-hidden-accessible"
                                style="color:black;" name="status" data-width="100%" data-select2-id="1"
                                tabindex="-1" aria-hidden="true" required>
                                <option value="" data-select2-id="3" style="color:black;">Select Status</option>
                                <option value="Under Processing" data-select2-id="3" style="color:black;">Under
                                    Processing</option>
                                <option value="Finished" data-select2-id="13" style="color:black;">Finished</option>
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label" style="color: gray;">Created by
                                <span>*</span></label>
                            <select name="users_id" style="background-color: aliceblue; color:black;"
                                class="form-control" required>
                                <option selected="" disabled="">Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
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
