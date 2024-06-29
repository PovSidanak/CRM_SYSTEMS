@extends('admin.admin_dashboard')
@section('admin')
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
    <div class="page-content" style="background-color:aliceblue">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card" style="background-color: aliceblue;border:none">
                        <div class="card-body">
                            <h6 class="card-title" style="color: black;">Edit Admin</h6>

                            <form id="myForm" method="POST" action="{{ route('update.admin', $user->id) }}"
                                class="forms-sample">
                                @csrf
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color:gray;">Admin User Name
                                        <span>*</span></label>
                                    <input type="text" style="background-color: aliceblue;color:black" name="username"
                                        class="form-control" value="{{ $user->username }}" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color:gray;">Admin Name
                                        <span>*</span></label>
                                    <input type="text" style="background-color: aliceblue;color:black" name="name"
                                        class="form-control" value="{{ $user->name }}" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color:gray;">Admin Email
                                        <span>*</span></label>
                                    <input type="email" style="background-color: aliceblue;color:black" name="email"
                                        class="form-control" value="{{ $user->email }}" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color:gray;">Admin Phone
                                        <span>*</span></label>
                                    <input type="text" style="background-color: aliceblue;color:black" name="phone"
                                        class="form-control" value="{{ $user->phone }}" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color:gray;">Admin Address
                                        <span>*</span></label>
                                    <input type="text" style="background-color: aliceblue;color:black" name="address"
                                        class="form-control" value="{{ $user->address }}" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="exampleInputEmail1" class="form-label" style="color:gray;">Role Name
                                        <span>*</span></label>
                                    <select name="roles" style="background-color: aliceblue;color:black"
                                        class="form-select" id="exampleFormControlSelect1" required>
                                        <option selected="" disabled="">Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}
                                            </option>
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
@endsection
