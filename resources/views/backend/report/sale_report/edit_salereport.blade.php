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

        .select2-hidden-accessible {
            background-color: aliceblue !important;
        }

        .js-example-basic-single {
            color: black !important;
        }
    </style>
    <div class="page-content" style="background-color: aliceblue;">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card" style="background-color: aliceblue; border:none">
                        <div class="card-body">
                            <h6 class="card-title" style="color: black;">View Sale Report</h6>

                            <form id="myForm" method="POST" action="{{ route('update.tickets', $salereports->id) }}"
                                class="forms-sample">
                                @csrf

                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" style="color: gray;" class="form-label">Assign To
                                        <span>*</span></label>
                                    <select name="users_id" style="background-color: aliceblue; color:black"
                                        class="form-select" id="exampleFormControlSelect1"
                                        value="{{ $salereports->users_id }}" required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" style="color: gray;" class="form-label">Customer Name
                                        <span>*</span></label>
                                    <select name="customers_id" style="background-color: aliceblue; color:black"
                                        class="form-select" id="exampleFormControlSelect1"
                                        value="{{ $salereports->customers_id }}" required>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color: gray;">Date of Prospect
                                        <span>*</span></label>
                                    <input type="date" name="date_of_project" class="form-control"
                                        style="color: black;background-color:aliceblue"
                                        value="{{ $salereports->date_of_project }}" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color: gray;">Project Name
                                        <span>*</span></label>
                                    <input type="name" name="project_name" class="form-control"
                                        style="color: black;background-color:aliceblue"
                                        value="{{ $salereports->project_name }}" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color: gray;">Project Close
                                        Date <span>*</span></label>
                                    <input type="date" name="project_close_date" class="form-control"
                                        style="color: black;background-color:aliceblue"
                                        value="{{ $salereports->project_close_date }}" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color: gray;">Summary of
                                        Engagment <span>*</span></label>
                                    <input type="text" name="sum_engage_client" class="form-control"
                                        style="color: black;background-color:aliceblue"
                                        value="{{ $salereports->sum_engage_client }}" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color: gray;">Nose of Visit
                                        <span>*</span></label>
                                    <input type="number" name="nos_of_visit" class="form-control"
                                        style="color: black;background-color:aliceblue"
                                        value="{{ $salereports->nos_of_visit }}" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color: gray;">Nos of Call
                                        <span>*</span></label>
                                    <input type="number" name="nos_of_call" class="form-control"
                                        style="color: black;background-color:aliceblue"
                                        value="{{ $salereports->nos_of_call }}" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color: gray;">Project Size
                                        Budget $ <span>*</span></label>
                                    <input type="dollar" name="project_size_budget" class="form-control"
                                        style="color: black;background-color:aliceblue"
                                        value="{{ $salereports->project_size_budget }}" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color: gray;">Note
                                        <span>*</span></label>
                                    <input type="text" name="note" class="form-control"
                                        style="color: black;background-color:aliceblue" value="{{ $salereports->note }}"
                                        required>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
