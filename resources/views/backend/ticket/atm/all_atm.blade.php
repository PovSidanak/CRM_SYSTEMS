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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content"style="background-color: aliceblue;">

        <div>
            @if (Auth::user()->can('add.atm'))
                <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal"
                    data-bs-target="#varyingModal" data-bs-whatever="@mdo">
                    <i class="btn-icon-prepend" data-feather="plus"></i>Add ATM
                </button>
            @endif
        </div>
        <br>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card" style="background-color: aliceblue; border:none;">
                    <div class="card-body">
                        <h6 class="card-title" style="color: black;">ATM All</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th style="color: gray;">ID</th>
                                        <th style="color: gray;">Name Company</th>
                                        <th style="color: gray;">Model</th>
                                        <th style="color: gray;">Type</th>
                                        <th style="color: gray;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($atms as $key => $item)
                                        <tr>
                                            <td style="color: black;">{{ $key + 1 }}</td>
                                            <td style="color: black;">{{ $item->name }}</td>
                                            <td style="color: black;">{{ $item->model }}</td>
                                            <td style="color: black;">{{ $item->type }}</td>
                                            <td>
                                                @if (Auth::user()->can('edit.atm'))
                                                    {{-- <a href="{{ route('edit.atms',$item->id)}}" class="btn btn-inverse-warning" title="Edit"><i data-feather="edit"></i></a> --}}
                                                    <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}" title="Edit"><i data-feather="edit"></i></button>
                                                @endif
                                                @if (Auth::user()->can('delete.atm'))
                                                    <a href="{{ route('delete.atms', $item->id) }}" id="delete" class="btn btn-outline-danger" title="Delete"><i data-feather="trash-2"></i></a>
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
                                                        <form id="myForm" method="POST" action="{{ route('update.atms', $item->id) }}" class="forms-sample">
                                                            @csrf
                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Company Name <span>*</span></label>
                                                                <input type="text" name="name" class="form-control" style="color: black;background-color:aliceblue" value="{{ $item->name }}" required>
                                                            </div>

                                                            <div class="mb-3 form-group">
                                                                <label class="form-label" style="color: gray;">ATM Model <span>*</span></label>
                                                                <select class="js-example-basic-single form-select select2-hidden-accessible" name="model" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                                                 value="{{ $item->model }}" style="color: black;" required>
                                                                    <option value="{{ $item->model }}" selected="" disabled="" >{{ $item->model }}</option>
                                                                    <option value="Model A" data-select2-id="3">Model A </option>
                                                                    <option value="Model B" data-select2-id="13">Model B</option>
                                                                    <option value="Model C" data-select2-id="14">Model C</option>
                                                                    <option value="Model D" data-select2-id="15">Model D </option>
                                                                    <option value="Model E" data-select2-id="16">Model E</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3 form-group">
                                                                <label class="form-label" style="color: gray;">ATM Classification <span>*</span></label>
                                                                <select class="js-example-basic-single form-select select2-hidden-accessible" name="classification" data-width="100%"
                                                                    data-select2-id="1" tabindex="-1" aria-hidden="true" style="color: black;" value="{{ $item->classification }}" required>
                                                                    <option value="{{ $item->classification }}" selected="" disabled="">{{ $item->classification }}</option>
                                                                    <option value="Yellow Label" data-select2-id="3">Yellow Label</option>
                                                                    <option value="White Label" data-select2-id="13">White Label</option>
                                                                    <option value="Green Label" data-select2-id="14">Green Label</option>
                                                                    <option value="Pink Label" data-select2-id="15">Pink Label</option>
                                                                    <option value="Brown Label" data-select2-id="16">Brown Label</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3 form-group">
                                                                <label class="form-label" style="color: gray;">ATM Type <span>*</span></label>
                                                                <select class="js-example-basic-single form-select select2-hidden-accessible" name="type" data-width="100%" data-select2-id="1"
                                                                    tabindex="-1" aria-hidden="true" style="color: black;" value="{{ $item->type }}" required>
                                                                    <option value="Type 1"selected="" disabled="">{{ $item->type }}</option>
                                                                    <option value="Type 1" data-select2-id="3">Type 1</option>
                                                                    <option value="Type2" data-select2-id="13">Type2 </option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3 form-group">
                                                                <label class="form-label" style="color: gray;">ATM Category <span>*</span></label>
                                                                <select class="js-example-basic-single form-select select2-hidden-accessible" name="category" data-width="100%" data-select2-id="1"
                                                                    tabindex="-1" aria-hidden="true" style="color: black;" value="{{ $item->category }}" required>
                                                                    <option value="" selected="" disabled="">{{ $item->category }}</option>
                                                                    <option value="Category A" data-select2-id="3">  Category A</option>
                                                                    <option value="Category B" data-select2-id="13"> Category B</option>
                                                                    <option value="Category C" data-select2-id="14"> Category C</option>
                                                                    <option value="Category D" data-select2-id="15">Category D</option>
                                                                    <option value="Category E" data-select2-id="16"> Category E</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3 form-group">
                                                                <label for="exampleInputEmail1" class="form-label"  style="color: gray;">Address <span>*</span></label>
                                                                <input type="text" name="address" class="form-control"  style="color: black;background-color:aliceblue" name="address" value="{{ $item->address }}" required>
                                                            </div>

                                                            <div class="mb-3 form-group">
                                                                <label class="form-label" style="color: gray;">City <span>*</span></label>
                                                                <select class="js-example-basic-single form-select select2-hidden-accessible" name="city" data-width="100%" data-select2-id="1"
                                                                    tabindex="-1" aria-hidden="true" style="color: black;" value="{{ $item->city }}" required>
                                                                    <option selected="" disabled="">{{ $item->city }}</option>
                                                                    <option value="Phnom Penh" data-select2-id="3">Phnom Penh</option>
                                                                    <option value="Kratie" data-select2-id="13">Kratie</option>
                                                                    <option value="Banteay Meanchey" data-select2-id="14"> Banteay Meanchey</option>
                                                                    <option value="Battambang" data-select2-id="15"> Battambang</option>
                                                                    <option value="Kampong Cham" data-select2-id="16">Kampong Cham</option>
                                                                    <option value="Kampong Chhnang" data-select2-id="16">Kampong Chhnang</option>
                                                                    <option value="Kampong Speu" data-select2-id="16"> Kampong Speu</option>
                                                                    <option value="Kampong Thom" data-select2-id="16"> Kampong Thom</option>
                                                                    <option value="Kampot" data-select2-id="16">Kampot</option>
                                                                    <option value="Kandal" data-select2-id="16">Kandal</option>
                                                                    <option value="Kep" data-select2-id="16">Kep</option>
                                                                    <option value="Koh Kong" data-select2-id="16">Koh Kong </option>
                                                                    <option value="Mondulkiri" data-select2-id="16"> Mondulkiri</option>
                                                                    <option value="Oddar Meanchhey" data-select2-id="16">Oddar Meanchhey</option>
                                                                    <option value="Paillin" data-select2-id="16">Paillin </option>
                                                                    <option value="Preah Sihanouk" data-select2-id="16"> Preah Sihanouk</option>
                                                                    <option value="Preah Vihea" data-select2-id="16">Preah Vihea</option>
                                                                    <option value="Prey Veng" data-select2-id="16">Prey Veng</option>
                                                                    <option value="Pursat" data-select2-id="16">Pursat </option>
                                                                    <option value="Ratanak Kiri" data-select2-id="16"> Ratanak Kiri</option>
                                                                    <option value="Stung Treng" data-select2-id="16">Stung Treng</option>
                                                                    <option value="Svay Rieng" data-select2-id="16">Svay Rieng</option>
                                                                    <option value="Takeo" data-select2-id="16">Takeo</option>
                                                                    <option value="Tboung Khmum" data-select2-id="16">Tboung Khmum</option>
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
                    <h5 class="modal-title" id="varyingModalLabel" style="color: black;">Add ATM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="myForm" method="POST" action="{{ route('store.atms') }}" class="forms-sample">
                        @csrf
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label" style="color: gray;">Company Name
                                <span>*</span></label>
                            <input type="text" name="name" class="form-control"
                                style="color: black;background-color:aliceblue" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label" style="color: gray;">ATM Model <span>*</span></label>
                            <select style="color: black;"
                                class="js-example-basic-single form-select select2-hidden-accessible" name="model"
                                data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                <option value="" selected="" disabled=""  style="color: gray;">Select Model</option>
                                <option value="Model A" data-select2-id="3">Model A</option>
                                <option value="Model B" data-select2-id="13">Model B</option>
                                <option value="Model C" data-select2-id="14">Model C</option>
                                <option value="Model D" data-select2-id="15">Model D</option>
                                <option value="Model E" data-select2-id="16">Model E</option>
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label" style="color: gray;">ATM Classification <span>*</span></label>
                            <select style="color: black;"
                                class="js-example-basic-single form-select select2-hidden-accessible"
                                name="classification" data-width="100%" data-select2-id="1" tabindex="-1"
                                aria-hidden="true" required>
                                <option value="" selected="" disabled="">Select Classification</option>
                                <option value="Yellow Label" data-select2-id="3">Yellow Label</option>
                                <option value="White Label" data-select2-id="13">White Label</option>
                                <option value="Green Label" data-select2-id="14">Green Label</option>
                                <option value="Pink Label" data-select2-id="15">Pink Label</option>
                                <option value="Brown Label" data-select2-id="16">Brown Label</option>
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label" style="color: gray;">ATM Type <span>*</span></label>
                            <select style="color: black;"
                                class="js-example-basic-single form-select select2-hidden-accessible" name="type"
                                data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                <option value="" selected="" disabled="">Select ATM Type</option>
                                <option value="Type 1" data-select2-id="3">Type 1</option>
                                <option value="Type2" data-select2-id="13">Type2</option>
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label style="color: black;" class="form-label" style="color: gray;">ATM Category
                                <span>*</span></label>
                            <select style="color: black;"
                                class="js-example-basic-single form-select select2-hidden-accessible" name="category"
                                data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                <option value="" selected="" disabled="">Select Category</option>
                                <option value="Category A" data-select2-id="3">Category A</option>
                                <option value="Category B" data-select2-id="13">Category B</option>
                                <option value="Category C" data-select2-id="14">Category C</option>
                                <option value="Category D" data-select2-id="15">Category D</option>
                                <option value="Category E" data-select2-id="16">Category E</option>
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label" style="color: gray;">Address<span>*</span></label>
                            <input type="text" name="address" class="form-control" style="color: black;background-color:aliceblue" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label" style="color: gray;">City <span>*</span></label>
                            <select style="color: black;"
                                class="js-example-basic-single form-select select2-hidden-accessible" name="city"
                                data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                <option value="Phnom Penh" selected="" disabled="">Select City</option>
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
@endsection
