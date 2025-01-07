@extends('layouts._app')
@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Add Tour Member</li>
    </ul>
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Member</h2>
    </div>
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Add</strong> Member</h3>
                            <ul class="panel-controls">
                            </ul>
                        </div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Member Name <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                        <input type="text" class="form-control"
                                            value="{{ old('name', $getRecord->name) }}" required placeholder="Member Name"
                                            name="name">
                                    </div>
                                    <div style="color:red">{{ $errors->first('name') }}</div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Mobile Number <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                        <input type="number" class="form-control"
                                            value="{{ old('mobile', $getRecord->mobile) }}" required
                                            placeholder="Mobile Number" name="mobile">
                                    </div>
                                    <div style="color:red">{{ $errors->first('mobile') }}</div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Paid Amount</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                        <input type="number" class="form-control"
                                            value="{{ old('paid_amount', $getRecord->paid_amount) }}"
                                            placeholder="Amount Paid" name="paid_amount">
                                    </div>
                                    <div style="color:red">{{ $errors->first('paid_amount') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Address <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                        <textarea name="address" class="form-control" required>{{ old('address', $getRecord->address) }}</textarea>
                                    </div>
                                    <div style="color:red">{{ $errors->first('address') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Member Photo</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-image"></span></span>
                                        <input type="file" class="form-control" style="padding: 5px" name="profile_pic">
                                    </div>
                                    <div style="color:red">{{ $errors->first('profile_pic') }}</div>
                                </div>
                            </div>
                            <input type="hidden", name="tour_id", value="{{ $getRecord->tour_id }}">
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
