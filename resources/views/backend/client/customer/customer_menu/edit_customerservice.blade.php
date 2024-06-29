@extends('admin.admin_dashboard')
@section('admin')
    <style>
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
    <div class="page-content" style="background-color: aliceblue;">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('all.customers') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('all.customerservice') }}">List Services</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('all.customercalls') }}">List Call</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('all.appointments') }}">List Appointment</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('all.quotations') }}">List Quotation</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('all.documents') }}">List Document</a></li>
                </ol>
            </nav>
        </div>
        <br>
        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card" style="background-color: aliceblue;border:none">
                        <div class="card-body">
                            <h6 class="card-title" style="color: black;">Edit Customer Service</h6>

                            <form id="myForm" method="POST"
                                action="{{ route('update.customerservice', $cservices->id) }}" class="forms-sample">
                                @csrf
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label"style="color: gray;">Services
                                        <span>*</span></label>
                                    <select name="services_id" style="background-color: aliceblue; color:black;"
                                        class="form-control" required>
                                        <option selected="" disabled="">Select Services</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color: gray;">Customer
                                        Designation <span>*</span></label>
                                    <input type="text" style="background-color: aliceblue; color:black;"
                                        name="customer_designation" class="form-control"
                                        value="{{ $cservices->customer_designation }}" required>
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color: gray;">Description
                                        <span>*</span></label>
                                    <input type="text" style="background-color: aliceblue; color:black;"
                                        name="description" class="form-control" value="{{ $cservices->description }}"
                                        required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color: gray;">Sold by
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
