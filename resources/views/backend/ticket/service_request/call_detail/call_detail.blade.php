@extends('admin.admin_dashboard')
@section('admin')
    <style>
        label>span {
            color: red;
            margin-left: 3px;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px aliceblue inset;
            -webkit-text-fill-color: black;
        }
    </style>
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

        label>span {
            color: red;
            margin-left: 3px;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px aliceblue inset;
            -webkit-text-fill-color: black;
        }
    </style>
    <div class="page-content" style="background-color: aliceblue;">
        {{-- header --}}
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('all.servicerequest') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('all.calldetails') }}">Call Detail</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('all.followup') }}">Follow Up</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('all.dispatch') }}">Dispatch</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('all.callclose') }}">Close Call</a></li>

                </ol>
            </nav>
        </div>

        {{-- Button add --}}
        <div>
            <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal"
                data-bs-target="#varyingModal" data-bs-whatever="@mdo">
                <i class="btn-icon-prepend" data-feather="plus"></i>Add Call
            </button>
        </div>
        <br>

        {{-- Body --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card" style="background-color: aliceblue; border:none;">
                    <div class="card-body">
                        <h6 class="card-title" style="color:black ;">Call Detail</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample1" class="table">
                                <thead>
                                    <tr>
                                        <th style="color: gray;">ID</th>
                                        <th style="color: gray;">Ticket</th>
                                        <th style="color: gray;">Docket No</th>
                                        <th style="color: gray;">Reference No</th>
                                        <th style="color: gray;">Contact Person</th>
                                        <th style="color: gray;">Contact No</th>
                                        <th style="color: gray;">Call Type</th>
                                        <th style="color: gray;">Call Date</th>
                                        <th style="color: gray;">Sub Call Type</th>
                                        <th style="color: gray;">Source</th>
                                        <th style="color: gray;">Ticket Owner</th>
                                        <th style="color: gray;">Type</th>
                                        <th style="color: gray;">Vendor</th>
                                        <th style="color: gray;">Taget Resolution Time</th>
                                        <th style="color: gray;">Target Response Time</th>
                                        <th style="color: gray;">Sub Status</th>
                                        <th style="color: gray;">Model</th>
                                        <th style="color: gray;">Site</th>
                                        <th style="color: gray;">Activity</th>
                                        <th style="color: gray;">Status</th>
                                        <th style="color: gray;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($combine_array as $key => $item)
                                        <tr>
                                            <td style="color: black;">{{ $key + 1 }}</td>
                                            <td style="color: black;">{{ $item->name_ticket }}</td>
                                            <td style="color: black;">{{ $item->docket_no }}</td>
                                            <td style="color: black;">{{ $item->reference_no }}</td>
                                            <td style="color: black;">{{ $item->contact_person }}</td>
                                            <td style="color: black;">{{ $item->contact_no }}</td>
                                            <td style="color: black;">{{ $item->call_type }}</td>
                                            <td style="color: black;">{{ $item->call_date }}</td>
                                            <td style="color: black;">{{ $item->sub_call_type }}</td>
                                            <td style="color: black;">{{ $item->source }}</td>
                                            <td style="color: black;">{{ $item->name_user }}</td>
                                            <td style="color: black;">{{ $item->type }}</td>
                                            <td style="color: black;">{{ $item->vendor }}</td>
                                            <td style="color: black;">{{ $item->target_resolution_time }}</td>
                                            <td style="color: black;">{{ $item->target_response_time }}</td>
                                            <td style="color: black;">{{ $item->sub_status }}</td>
                                            <td style="color: black;">{{ $item->model }}</td>
                                            <td style="color: black;">{{ $item->location }}</td>
                                            <td style="color: black;">{{ $item->activity }}</td>
                                            <td style="color: black;">{{ $item->status }}</td>

                                            <td>
                                                <a href="{{ route('delete.calldetails', $item->id) }}" id="delete" class="btn btn-outline-danger" title="Delete"><i data-feather="trash-2"></i></a>
                                            </td>
                                        </tr>
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
                    <h5 class="modal-title" id="varyingModalLabel" style="color: black;">Add Call</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="myForm" method="POST" action="{{ route('store.calls') }}" class="forms-sample">
                        <div class="row">
                            @csrf

                            <div class="mb-3 form-group col-md-6">
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Docker No<span>*</span></label>
                                <input type="number" name="docket_no" class="form-control"  style="color: black;background-color:aliceblue" required>
                            </div>
                            <div class="mb-3 form-group col-md-6">
                                <label for="exampleInputEmail1" style="color: gray;" class="form-label">Ticket Name<span>*</span></label>
                                <select name="tickets_id" style="background-color: aliceblue; color:black" class="form-select" id="exampleFormControlSelect1" required>
                                    <option selected="" disabled="">Select Ticket</option>
                                    @foreach ($tickets as $ticket)
                                        <option value="{{ $ticket->id }}">{{ $ticket->diagnoise }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 form-group col-md-6">
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Reference No<span>*</span></label>
                                <input type="number" name="reference_no" class="form-control" style="color: black;background-color:aliceblue" required>
                            </div>
                            <div class="mb-3 form-group col-md-6">
                                <label class="form-label" style="color: gray;">Contact Person <span>*</span></label>
                                <input type="text" name="contact_person" class="form-control" style="color: black;background-color:aliceblue" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 form-group  col-md-6">
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Contact No<span>*</span></label>
                                <input type="text" name="contact_no" class="form-control" style="color: black;background-color:aliceblue" required>
                            </div>
                            <div class="mb-3 form-group  col-md-6">
                                <label class="form-label" style="color: gray;">Call Type <span>*</span></label>
                                <select style="color: black;background-color:aliceblue" class="js-example-basic-single form-select select2-hidden-accessible" name="call_type" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                    <option value="Under Processing" data-select2-id="3">Under Processing</option>
                                    <option value="Finished" data-select2-id="13">Finished</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 form-group col-md-6">
                                <label class="form-label" style="color: gray;">Call Date<span>*</span></label>
                                <input type="date" name="call_date" class="form-control" style="color: black;background-color:aliceblue" required>
                            </div>
                            <div class="mb-3 form-group col-md-6">
                                <label class="form-label" style="color: gray;">Sub Call Type <span>*</span></label>
                                <select style="color: black;background-color:aliceblue" class="js-example-basic-single form-select select2-hidden-accessible" name="sub_call_type" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                    <option value="Under Processing" data-select2-id="3">Under Processing</option>
                                    <option value="Finished" data-select2-id="13">Finished</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 form-group col-md-6">
                                <label class="form-label" style="color: gray;">Source<span>*</span></label>
                                <input type="text" name="source" class="form-control" style="color: black;background-color:aliceblue" required>
                            </div>
                            <div class="mb-3 form-group col-md-6">
                                <label for="exampleInputEmail1" style="color: gray;" class="form-label">Ticket Ownership
                                    <span>*</span></label>
                                <select name="users_id" style="background-color: aliceblue; color:black" class="form-select" id="exampleFormControlSelect1" required>
                                    <option selected="" disabled="">Select Owner </option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 form-group col-md-6">
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Type<span>*</span></label>
                                <input type="text" name="type" class="form-control" style="color: black;background-color:aliceblue" required>
                            </div>
                            <div class="mb-3 form-group col-md-6">
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Vendor<span>*</span></label>
                                <select style="color: black;background-color:aliceblue" class="js-example-basic-single form-select select2-hidden-accessible" name="vendor" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                    <option value=">Vendor A" data-select2-id="3">Vendor A</option>
                                    <option value="Vendor B" data-select2-id="13">Vendor B</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 form-group col-md-6">
                                <label class="form-label" style="color: gray;">Status <span>*</span></label>
                                <select style="color: black;background-color:aliceblue" class="js-example-basic-single form-select select2-hidden-accessible" name="status" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                    <option value="Under Processing" data-select2-id="3">Under Processing</option>
                                    <option value="Finished" data-select2-id="13">Finished</option>
                                </select>
                            </div>
                            <div class="mb-3 form-group col-md-6">
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Target Resolution Time<span>*</span></label>
                                <input type="time" name="target_resolution_time" class="form-control"
                                    style="color: black;background-color:aliceblue" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 form-group col-md-6">
                                <label class="form-label" style="color: gray;">Sub Status<span>*</span></label>
                                <select style="color: black;background-color:aliceblue" class="js-example-basic-single form-select select2-hidden-accessible" name="sub_status" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                    <option value="Under Processing" data-select2-id="3">Under Processing</option>
                                    <option value="Finished" data-select2-id="13">Finished</option>
                                </select>
                            </div>
                            <div class="mb-3 form-group col-md-6">
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Target Response Time<span>*</span></label>
                                <input type="time" name="target_response_time" class="form-control"
                                    style="color: black;background-color:aliceblue" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 form-group col-md-6">
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Model<span>*</span></label>
                                <input type="model" name="model" class="form-control"
                                    style="color: black;background-color:aliceblue" required>
                            </div>
                            <div class="mb-3 form-group col-md-6">
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Support Location<span>*</span></label>
                                <input type="location" name="location" class="form-control"
                                    style="color: black;background-color:aliceblue" >
                            </div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label" style="color: gray;">Activity<span>*</span></label>
                            <textarea type="text" name="activity" class="form-control"
                                style="color: black;background-color:aliceblue" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Save</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
