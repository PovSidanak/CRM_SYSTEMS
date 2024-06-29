@extends('admin.admin_dashboard')
@section('admin')
    <style>
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

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px aliceblue inset;
            -webkit-text-fill-color: black;
        }
    </style>
    <div class="page-content" style="background-color: aliceblue;">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card" style="background-color: aliceblue; border:none">
                        <div class="card-body">
                            <h6 class="card-title" style="color: black;">Edit ATM</h6>

                            <form id="myForm" method="POST" action="{{ route('update.tickets', $tickets->id) }}"
                                class="forms-sample">
                                @csrf
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" style="color: gray;" class="form-label">ATM Name
                                        <span>*</span></label>
                                    <select name="a_t_m_s_id" style="background-color: aliceblue; color:black"
                                        class="form-select" id="exampleFormControlSelect1" required>
                                        @foreach ($atms as $atm)
                                            <option value="{{ $atm->id }}">{{ $atm->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color: gray;">Source
                                        <span>*</span></label>
                                    <input type="text" name="source" class="form-control"
                                        style="color: black;background-color:aliceblue" value="{{ $tickets->source }}"
                                        required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color: gray;">Phone
                                        <span>*</span></label>
                                    <input type="phone" name="phone" class="form-control"
                                        style="color: black;background-color:aliceblue" value="{{ $tickets->phone }}"
                                        required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="form-label" style="color: gray;">Call Type <span>*</span></label>
                                    <select class="js-example-basic-single form-select select2-hidden-accessible"
                                        name="call_type" style="background-color: aliceblue; color:black" data-width="100%"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true"
                                        value="{{ $tickets->call_type }}" required>
                                        <option value="{{ $tickets->call_type }}">{{ $tickets->call_type }} </option>
                                        <option value="Under Processing" data-select2-id="3">Under Processing</option>
                                        <option value="Finished" data-select2-id="13">Finished</option>
                                    </select>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color: gray;">Call Date
                                        <span>*</span></label>
                                    <input type="date" name="call_date" class="form-control"
                                        style="color: black;background-color:aliceblue" value="{{ $tickets->call_date }}"
                                        required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="form-label" style="color: gray;">Status <span>*</span></label>
                                    <select class="js-example-basic-single form-select select2-hidden-accessible"
                                        name="status" style="background-color: aliceblue; color:black" data-width="100%"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true" value="{{ $tickets->status }}"
                                        required>
                                        <option value="{{ $tickets->status }}">{{ $tickets->status }} </option>
                                        <option value="Request" data-select2-id="3">Request</option>
                                        <option value="Pending" data-select2-id="13">Pending</option>
                                        <option value="Approve" data-select2-id="13">Approve</option>
                                        <option value="Reject" data-select2-id="13">Reject</option>
                                    </select>
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="form-label" style="color: gray;">Sub Call Type <span>*</span></label>
                                    <select style="background-color: aliceblue; color:black"
                                        class="js-example-basic-single form-select select2-hidden-accessible"
                                        name="sub_call_type" data-width="100%" data-select2-id="1" tabindex="-1"
                                        aria-hidden="true" value="{{ $tickets->sub_call_type }}" required>
                                        <option value="{{ $tickets->sub_call_type }}">{{ $tickets->sub_call_type }}
                                        </option>
                                        <option value="Type A" data-select2-id="3">Type A</option>
                                        <option value="Type B" data-select2-id="13">Type B</option>
                                    </select>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color: gray;">Diagnoise
                                        <span>*</span></label>
                                    <input type="text" name="diagnoise" class="form-control"
                                        style="color: black;background-color:aliceblue" value="{{ $tickets->diagnoise }}"
                                        required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="form-label" style="color: gray;">Vendor <span>*</span></label>
                                    <select style="background-color: aliceblue; color:black"
                                        class="js-example-basic-single form-select select2-hidden-accessible"
                                        name="vendor" data-width="100%" data-select2-id="1" tabindex="-1"
                                        aria-hidden="true" value="{{ $tickets->vendor }}" required>
                                        <option value="{{ $tickets->vendor }}">{{ $tickets->vendor }} </option>
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
                                        value="{{ $tickets->users_id }}" required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color: gray;">Address
                                        <span>*</span></label>
                                    <input type="text" name="address" class="form-control"
                                        style="color: black;background-color:aliceblue" value="{{ $tickets->address }}"
                                        required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label class="form-label" style="color: gray;">City <span>*</span></label>
                                    <select style="background-color: aliceblue; color:black"
                                        class="js-example-basic-single form-select select2-hidden-accessible"
                                        name="city" data-width="100%" data-select2-id="1" tabindex="-1"
                                        aria-hidden="true" value="{{ $tickets->city }}" required>
                                        <option value="{{ $tickets->city }}">{{ $tickets->city }} </option>
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
        </div>
    </div>
@endsection
