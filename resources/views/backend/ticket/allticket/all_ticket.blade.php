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

        .select2-hidden-accessible {
            background-color: aliceblue !important;
        }

        .js-example-basic-single {
            color: black !important;
        }

        /* .form-control:focus, .form-control:hover, .form-control:active ,.form-control:checked , .form-control:click{
        -webkit-box-shadow: 0 0 0 30px aliceblue !important;
        -webkit-text-fill-color: black !important;
      } */
    </style>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content"style="background-color: aliceblue;">

        <div>
            @if (Auth::user()->can('add.ticket'))
            <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#varyingModal" data-bs-whatever="@mdo">
                <i class="btn-icon-prepend" data-feather="plus"></i>Add Ticket
            </button>
            @endif
        </div>
        <br>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card" style="background-color: aliceblue; border:none;">
                    <div class="card-body">
                        <h6 class="card-title" style="color:black ;">Ticket</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th style="color: gray;">ID</th>
                                        <th style="color: gray;">Name Company</th>
                                        <th style="color: gray;">Ticket</th>
                                        <th style="color: gray;">Status</th>
                                        <th style="color: gray;">Assign To</th>
                                        <th style="color: gray;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($combine_array as $key => $item)
                                        <tr>
                                            <td style="color: black;">{{ $key + 1 }}</td>
                                            <td style="color: black;">{{ $item->name_atm }}</td>
                                            <td style="color: black;">{{ $item->diagnoise }}</td>
                                            <td style="color: black;">{{ $item->status }}</td>
                                            <td style="color: black;">{{ $item->name_user }}</td>
                                            <td>
                                                @if (Auth::user()->can('edit.ticket'))
                                                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}" title="Edit"><i data-feather="edit"></i></button>
                                                @endif
                                                @if (Auth::user()->can('delete.ticket'))
                                                <a href="{{ route('delete.tickets', $item->id) }}" id="delete" class="btn btn-outline-danger" title="Delete"><i data-feather="trash-2"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        {{-- Edit form --}}
                                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="background-color: aliceblue;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Edit ATM</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="myForm" method="POST" action="{{ route('update.tickets', $item->id) }}" class="forms-sample">
                                                            @csrf
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" style="color: gray;" class="form-label">ATM Name <span>*</span></label>
                                                                <select name="a_t_m_s_id" style="background-color: aliceblue; color:black" class="form-select" id="exampleFormControlSelect1" required>
                                                                    @foreach ($atms as $atm)
                                                                        <option value="{{ $atm->id }}">{{ $atm->name }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Source<span>*</span></label>
                                                                <input type="text" name="source" class="form-control" style="color: black;background-color:aliceblue" value="{{ $item->source }}" required>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Phone <span>*</span></label>
                                                                <input type="phone" name="phone" class="form-control" style="color: black;background-color:aliceblue" value="{{ $item->phone }}" required>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label class="form-label" style="color: gray;">Call Type <span>*</span></label>
                                                                <select class="js-example-basic-single form-select select2-hidden-accessible" name="call_type" style="background-color: aliceblue; color:black" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true"  value="{{ $item->call_type }}" required>
                                                                    <option value="{{ $item->call_type }}">{{ $item->call_type }} </option>
                                                                    <option value="Under Processing" data-select2-id="3">Under Processing</option>
                                                                    <option value="Finished" data-select2-id="13">Finished</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Call Date <span>*</span></label>
                                                                <input type="date" name="call_date" class="form-control" style="color: black;background-color:aliceblue" value="{{ $item->call_date }}" required>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label class="form-label" style="color: gray;">Status <span>*</span></label>
                                                                <select class="js-example-basic-single form-select select2-hidden-accessible" name="status" style="background-color: aliceblue; color:black" data-width="100%"
                                                                    data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ $item->status }}" required>
                                                                    <option value="{{ $item->status }}">{{ $item->status }} </option>
                                                                    <option value="Request" data-select2-id="3">Request</option>
                                                                    <option value="Pending" data-select2-id="13">Pending</option>
                                                                    <option value="Approve" data-select2-id="13">Approve</option>
                                                                    <option value="Reject" data-select2-id="13">Reject</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label class="form-label" style="color: gray;">Sub Call Type <span>*</span></label>
                                                                <select style="background-color: aliceblue; color:black" class="js-example-basic-single form-select select2-hidden-accessible"
                                                                    name="sub_call_type" data-width="100%" data-select2-id="1" tabindex="-1"aria-hidden="true" value="{{ $item->sub_call_type }}" required>
                                                                    <option value="{{ $item->sub_call_type }}">{{ $item->sub_call_type }} </option>
                                                                    <option value="Type A" data-select2-id="3">Type A</option>
                                                                    <option value="Type B" data-select2-id="13">Type B</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Diagnoise<span>*</span></label>
                                                                <input type="text" name="diagnoise" class="form-control" style="color: black;background-color:aliceblue" value="{{ $item->diagnoise }}" required>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label class="form-label" style="color: gray;">Vendor <span>*</span></label>
                                                                <select style="background-color: aliceblue; color:black" class="js-example-basic-single form-select select2-hidden-accessible"
                                                                    name="vendor" data-width="100%" data-select2-id="1" tabindex="-1"aria-hidden="true" value="{{ $item->vendor }}" required>
                                                                    <option value="{{ $item->vendor }}">{{ $item->vendor }} </option>
                                                                    <option value="Vendor A" data-select2-id="3">Vendor A</option>
                                                                    <option value="Vendor B" data-select2-id="13">Vendor B</option>
                                                                    <option value="Vendor C" data-select2-id="3">Vendor C</option>
                                                                    <option value="Vendor " data-select2-id="13">Vendor D</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" style="color: gray;" class="form-label">Assign To
                                                                    <span>*</span></label>
                                                                <select name="users_id" style="background-color: aliceblue; color:black"
                                                                    class="form-select" id="exampleFormControlSelect1"
                                                                    value="{{ $item->users_id }}" required>
                                                                    @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}">{{ $user->name }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Address
                                                                    <span>*</span></label>
                                                                <input type="text" name="address" class="form-control"
                                                                    style="color: black;background-color:aliceblue" value="{{ $item->address }}"
                                                                    required>
                                                            </div>
                                                            <div class="mb-3 form-group">
                                                                <label class="form-label" style="color: gray;">City <span>*</span></label>
                                                                <select style="background-color: aliceblue; color:black"
                                                                    class="js-example-basic-single form-select select2-hidden-accessible"
                                                                    name="city" data-width="100%" data-select2-id="1" tabindex="-1"
                                                                    aria-hidden="true" value="{{ $item->city }}" required>
                                                                    <option value="{{ $item->city }}">{{ $item->city }} </option>
                                                                    <option value="Phnom Penh" data-select2-id="3">Phnom Penh</option>
                                                                    <option value="Kratie" data-select2-id="13">Kratie</option>
                                                                    <option value="Banteay Meanchey" data-select2-id="14">Banteay Meanchey</option>
                                                                    <option value="Battambang" data-select2-id="15">Battambang</option>
                                                                    <option value="Kampong Cham" data-select2-id="16">Kampong Cham</option>
                                                                    <option value="Kampong Chhnang" data-select2-id="16">Kampong Chhnang</option>
                                                                    <option value="Kampong Speu" data-select2-id="16">Kampong Speu</option>
                                                                    <option value="Kampong Thom" data-select2-id="16">Kampong Thom</option>
                                                                    <option value="Kampot" data-select2-id="16">Kampot</option>
                                                                    <option value="Kandal" data-select2-id="16">Kandal</option>
                                                                    <option value="Kep" data-select2-id="16">Kep</option>
                                                                    <option value="Koh Kong" data-select2-id="16">Koh Kong</option>
                                                                    <option value="Mondulkiri" data-select2-id="16">Mondulkiri</option>
                                                                    <option value="Oddar Meanchhey" data-select2-id="16">Oddar Meanchhey</option>
                                                                    <option value="Paillin" data-select2-id="16">Paillin</option>
                                                                    <option value="Preah Sihanouk" data-select2-id="16">Preah Sihanouk</option>
                                                                    <option value="Preah Vihea" data-select2-id="16">Preah Vihea</option>
                                                                    <option value="Prey Veng" data-select2-id="16">Prey Veng</option>
                                                                    <option value="Pursat" data-select2-id="16">Pursat</option>
                                                                    <option value="Ratanak Kiri" data-select2-id="16">Ratanak Kiri</option>
                                                                    <option value="Stung Treng" data-select2-id="16">Stung Treng</option>
                                                                    <option value="Svay Rieng" data-select2-id="16">Svay Rieng</option>
                                                                    <option value="Takeo" data-select2-id="16">Takeo</option>
                                                                    <option value="Tboung Khmum" data-select2-id="16">Tboung Khmum</option>
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary me-2">Save</button>
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
                    <h5 class="modal-title" id="varyingModalLabel" style="color: black;">Add Ticket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="myForm" method="POST" action="{{ route('store.tickets') }}" class="forms-sample">
                        <div class="row">
                            @csrf
                            <div class="mb-3 form-group col-md-6">
                                <label for="exampleInputEmail1" style="color: gray;" class="form-label">ATM Name
                                    <span>*</span></label>
                                <select name="a_t_m_s_id" style="background-color: aliceblue; color:black"
                                    class="form-select" id="exampleFormControlSelect1" required>
                                    <option selected="" disabled="">Select ATM</option>
                                    @foreach ($atms as $atm)
                                        <option value="{{ $atm->id }}">{{ $atm->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 form-group col-md-6">
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Source
                                    <span>*</span></label>
                                <input type="text" name="source" class="form-control"
                                    style="color: black;background-color:aliceblue" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 form-group col-md-6">
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Phone
                                    <span>*</span></label>
                                <input type="phone" name="phone" class="form-control"
                                    style="color: black;background-color:aliceblue" required>
                            </div>
                            <div class="mb-3 form-group col-md-6">
                                <label class="form-label" style="color: gray;">Call Type <span>*</span></label>
                                <select class="js-example-basic-single form-select select2-hidden-accessible"
                                    name="call_type" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                    required>
                                    <option value="Under Processing" data-select2-id="3">Under Processing</option>
                                    <option value="Finished" data-select2-id="13">Finished</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 form-group  col-md-6">
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Call Date
                                    <span>*</span></label>
                                <input type="date" name="call_date" class="form-control"
                                    style="color: black;background-color:aliceblue" required>
                            </div>
                            <div class="mb-3 form-group  col-md-6">
                                <label class="form-label" style="color: gray;">Status <span>*</span></label>
                                <select class="js-example-basic-single form-select select2-hidden-accessible"
                                    name="status" data-width="100%" data-select2-id="1" tabindex="-1"
                                    aria-hidden="true" required>
                                    <option value="Request" data-select2-id="3">Request</option>
                                    <option value="Pending" data-select2-id="13">Pending</option>
                                    <option value="Approve" data-select2-id="13">Approve</option>
                                    <option value="Reject" data-select2-id="13">Reject</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 form-group col-md-6">
                                <label class="form-label" style="color: gray;">Sub Call Type <span>*</span></label>
                                <select class="js-example-basic-single form-select select2-hidden-accessible"
                                    name="sub_call_type" data-width="100%" data-select2-id="1" tabindex="-1"
                                    aria-hidden="true" required>
                                    <option value="Type A" data-select2-id="3">Type A</option>
                                    <option value="Type B" data-select2-id="13">Type B</option>
                                </select>
                            </div>
                            <div class="mb-3 form-group col-md-6">
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Diagnoise
                                    <span>*</span></label>
                                <input type="text" name="diagnoise" class="form-control"
                                    style="color: black;background-color:aliceblue" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 form-group col-md-6">
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Address
                                    <span>*</span></label>
                                <input type="text" name="address" class="form-control"
                                    style="color: black;background-color:aliceblue" required>
                            </div>
                            <div class="mb-3 form-group col-md-6">
                                <label for="exampleInputEmail1" style="color: gray;" class="form-label">Assign To
                                    <span>*</span></label>
                                <select name="users_id" style="background-color: aliceblue; color:black"
                                    class="form-select" id="exampleFormControlSelect1" required>
                                    <option selected="" disabled="">Select Name </option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label" style="color: gray;">City <span>*</span></label>
                            <select class="js-example-basic-single form-select select2-hidden-accessible" name="city"
                                data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                <option value="Phnom Penh" data-select2-id="3">Phnom Penh</option>
                                <option value="Kratie" data-select2-id="13">Kratie</option>
                                <option value="Banteay Meanchey" data-select2-id="14">Banteay Meanchey</option>
                                <option value="Battambang" data-select2-id="15">Battambang</option>
                                <option value="Kampong Cham" data-select2-id="16">Kampong Cham</option>
                                <option value="Kampong Chhnang" data-select2-id="16">Kampong Chhnang</option>
                                <option value="Kampong Speu" data-select2-id="16">Kampong Speu</option>
                                <option value="Kampong Thom" data-select2-id="16">Kampong Thom</option>
                                <option value="Kampot" data-select2-id="16">Kampot</option>
                                <option value="Kandal" data-select2-id="16">Kandal</option>
                                <option value="Kep" data-select2-id="16">Kep</option>
                                <option value="Koh Kong" data-select2-id="16">Koh Kong</option>
                                <option value="Mondulkiri" data-select2-id="16">Mondulkiri</option>
                                <option value="Oddar Meanchhey" data-select2-id="16">Oddar Meanchhey</option>
                                <option value="Paillin" data-select2-id="16">Paillin</option>
                                <option value="Preah Sihanouk" data-select2-id="16">Preah Sihanouk</option>
                                <option value="Preah Vihea" data-select2-id="16">Preah Vihea</option>
                                <option value="Prey Veng" data-select2-id="16">Prey Veng</option>
                                <option value="Pursat" data-select2-id="16">Pursat</option>
                                <option value="Ratanak Kiri" data-select2-id="16">Ratanak Kiri</option>
                                <option value="Stung Treng" data-select2-id="16">Stung Treng</option>
                                <option value="Svay Rieng" data-select2-id="16">Svay Rieng</option>
                                <option value="Takeo" data-select2-id="16">Takeo</option>
                                <option value="Tboung Khmum" data-select2-id="16">Tboung Khmum</option>
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label" style="color: gray;">Vendor <span>*</span></label>
                            <select class="js-example-basic-single form-select select2-hidden-accessible" name="vendor"
                                data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                <option value="Vendor A" data-select2-id="3">Vendor A</option>
                                <option value="Vendor B" data-select2-id="13">Vendor B</option>
                                <option value="Vendor C" data-select2-id="3">Vendor C</option>
                                <option value="Vendor " data-select2-id="13">Vendor D</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Save</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
