@extends('layouts._app')
@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Edit Employee</li>
    </ul>
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Employee</h2>
    </div>
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Edit Employee</strong> Information</h3>
                            <ul class="panel-controls">
                            </ul>
                        </div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Employee Name</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                        <input type="text" class="form-control"
                                            value="{{ old('name', $getRecord->name) }}" required placeholder="Employee Name"
                                            name="name">
                                    </div>
                                    <div style="color:red">{{ $errors->first('name') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Employee Email </label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                        <input type="text" class="form-control"
                                            value="{{ old('email', $getRecord->email) }}" placeholder="Employee Email"
                                            name="email">
                                    </div>
                                    <div style="color:red">{{ $errors->first('email') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Mobile Number</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                        <input type="number" class="form-control"
                                            value="{{ old('mobile', $getRecord->mobile) }}" required
                                            placeholder="Mobile Number" name="mobile">
                                    </div>
                                    <div style="color:red">{{ $errors->first('email') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Present Address</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                        <textarea name="present_address" class="form-control" required>{{ old('present_address', $getRecord->present_address) }}</textarea>
                                    </div>
                                    <div style="color:red">{{ $errors->first('present_address') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Permenent Address</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                        <textarea name="permenent_address" class="form-control">{{ old('permenent_address', $getRecord->permenent_address) }}</textarea>
                                    </div>
                                    <div style="color:red">{{ $errors->first('permenent_address') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Profile Picture</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-image"></span></span>
                                        <input type="file" class="form-control"
                                            value="{{ old('profile_pic', $getRecord->profile_pic) }}" style="padding: 5px"
                                            name="profile_pic">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">NID Number</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                                        <input type="number" class="form-control"
                                            value="{{ old('nid', $getRecord->nid) }}" required placeholder="NID Number"
                                            name="nid">
                                    </div>
                                    <div style="color:red">{{ $errors->first('nid') }}</div>
                                </div>
                            </div>
                            @php
                                use Carbon\Carbon;
                                $getRecord->birthday = Carbon::parse($getRecord->birthday)->format('Y-m-d');
                            @endphp
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Date of Birth</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input type="date" class="form-control"
                                            value="{{ old('birthday', $getRecord->birthday) }}" required name="birthday">
                                    </div>
                                    <div style="color:red">{{ $errors->first('birthday') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Employee Role </label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                                        <input type="text" class="form-control"
                                            value="{{ old('role', $getRecord->role) }}" placeholder="Employee Role"
                                            name="role">
                                    </div>
                                    <div style="color:red">{{ $errors->first('role', $getRecord->role) }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Gender</label>
                                <div class="col-md-6 col-xs-12">
                                    <select name="gender" class="form-control" required>
                                        <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>

                                        <option {{ old('gender', $getRecord->gender) == 'Male' ? 'selected' : '' }}
                                            value="Male">
                                            Male
                                        </option>
                                        <option {{ old('gender', $getRecord->gender) == 'Female' ? 'selected' : '' }}
                                            value="Female">
                                            Female
                                        </option>




                                    </select>

                                </div>
                                <div style="color:red">{{ $errors->first('designation') }}</div>
                            </div>

                            <hr>

                            <h3 class="panel-title"><strong>Add Nominee</strong> Information</h3>
                            <ul class="panel-controls">
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Nominee Name</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                        <input type="text" class="form-control"
                                            value="{{ old('nominee_name', $getRecord->nominee_name) }}" required
                                            placeholder="Nominee Name" name="nominee_name">
                                    </div>
                                    <div style="color:red">{{ $errors->first('name') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Nominee NID </label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                                        <input type="number" class="form-control"
                                            value="{{ old('nominee_nid', $getRecord->nominee_nid) }}"
                                            placeholder="Nominee NID Number" name="nominee_nid">
                                    </div>
                                    <div style="color:red">{{ $errors->first('nid') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Realtion with Employee</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                        <input type="text" class="form-control"
                                            value="{{ old('nominee_relation', $getRecord->nominee_relation) }}" required
                                            placeholder="Realtion with Employee" name="nominee_relation">
                                    </div>
                                    <div style="color:red">{{ $errors->first('nid') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Nominee Address</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                        <textarea name="nominee_address" class="form-control" required>{{ old('nominee_address', $getRecord->nominee_address) }}</textarea>
                                    </div>
                                    <div style="color:red">{{ $errors->first('nominee_address') }}</div>
                                </div>
                            </div>

                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-danger pull-right"><i class="fa fa-save"></i> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('script')
@endsection
