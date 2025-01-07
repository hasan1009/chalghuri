@extends('layouts._app')
@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Add Admin</li>
    </ul>
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Admins</h2>
    </div>
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <form class="form-horizontal" enctype="multipart/form-data">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Add New</strong> Admin</h3>
                            <ul class="panel-controls">
                            </ul>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Admin Name</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" value="{{ old('name') }}" required
                                            placeholder="Name" name="name">
                                    </div>
                                    <div style="color:red">{{ $errors->first('name') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Admin Email</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                        <input type="text" class="form-control" value="{{ old('email') }}" required
                                            placeholder="Name" name="email">
                                    </div>
                                    <div style="color:red">{{ $errors->first('email') }}</div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Password</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                        <input type="password" class="form-control" />
                                    </div>
                                    <div style="color:red">{{ $errors->first('password') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Designation</label>
                                <div class="col-md-6 col-xs-12">
                                    <select name="designation" class="form-control" required>
                                        <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                        <option>Select Designation </option>
                                        <option {{ old('designation') == 'Managing Director' ? 'selected' : '' }}
                                            value="Managing Director">Managing director
                                        </option>

                                        <option {{ old('designation') == 'Deputy Managing director' ? 'selected' : '' }}
                                            value="Managing Director">Deputy Managing Director
                                        </option>

                                        <option {{ old('designation') == 'General Member' ? 'selected' : '' }}
                                            value="General Member">General Member
                                        </option>

                                    </select>

                                </div>
                                <div style="color:red">{{ $errors->first('password') }}</div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Profile Picture</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-image"></span></span>
                                        <input type="file" class="form-control" style="padding: 5px" name="profile_pic"
                                            required>
                                    </div>
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
