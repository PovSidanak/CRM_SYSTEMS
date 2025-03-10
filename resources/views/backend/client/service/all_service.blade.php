@extends('admin.admin_dashboard')
@section('admin')
    <style>
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

        .pagination {
            --bs-pagination-disabled-bg: aliceblue;
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

    <div class="page-content"style="background-color: aliceblue;">
        <div>
            @if (Auth::user()->can('add.service'))
                <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal"
                    data-bs-target="#varyingModal" data-bs-whatever="@mdo">
                    <i class="btn-icon-prepend" data-feather="plus"></i>Add Service
                </button>
            @endif
        </div>
        <br>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card" style="background-color: aliceblue; border:none;">
                    <div class="card-body">
                        <h6 class="card-title" style="color: black;">Service All</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th style="color: gray;">ID</th>
                                        <th style="color: gray;">Name</th>
                                        <th style="color: gray;">Description</th>
                                        <th style="color: gray;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $key => $item)
                                        <tr>
                                            <td style="color: black;">{{ $key + 1 }}</td>
                                            <td style="color: black;">{{ $item->name }}</td>
                                            <td style="color: black;">{{ $item->description }}</td>
                                            <td>
                                                @if (Auth::user()->can('edit.service'))
                                                    <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}" title="Edit"><i data-feather="edit"></i></button>
                                                @endif
                                                @if (Auth::user()->can('delete.service'))
                                                    <a href="{{ route('delete.services', $item->id) }}" id="delete" class="btn btn-outline-danger" title="Delete"><i data-feather="trash-2"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        {{-- Edit form --}}
                                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="background-color: aliceblue;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Edit Service</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="myForm" method="POST" action="{{ route('update.services', $item->id) }}" class="forms-sample">
                                                            @csrf
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Service Name <span>*</span></label>
                                                                <input type="text" style="background-color: aliceblue; color:black" name="name" class="form-control" value="{{ $item->name }}" required>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Service Description<span>*</span></label>
                                                                <input type="text" style="background-color: aliceblue; color:black" name="description" class="form-control" value="{{ $item->description }}" required>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary me-2">Update</button>
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
                    <h5 class="modal-title" id="varyingModalLabel" style="color: black;">Add Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="myForm" method="POST" action="{{ route('store.services') }}" class="forms-sample">
                        @csrf
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" style="color: gray;" class="form-label">Service Name <span>*</span></label>
                            <input type="text" name="name" style="background-color: aliceblue; color:black" class="form-control" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" style="color: gray;" class="form-label">Service Description<span>*</span></label>
                            <input type="text" name="description" style="background-color: aliceblue; color:black" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Save</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
