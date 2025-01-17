@extends('layouts._app')
@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Add Tour</li>
    </ul>
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Upcoming Tour</h2>
    </div>
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Add</strong> Tour</h3>
                            <ul class="panel-controls">
                            </ul>
                        </div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Tour Name <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-stack-overflow"></span></span>
                                        <input type="text" class="form-control"
                                            value="{{ old('tour_name', $getRecord->tour_name) }}" required
                                            placeholder="Tour Name" name="tour_name">
                                    </div>
                                    <div style="color:red">{{ $errors->first('tour_name') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Tour Description </label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <textarea name="tour_description" class="form-control">{{ old('tour_description', $getRecord->tour_description) }}</textarea>
                                    </div>
                                    <div style="color:red">{{ $errors->first('tour_description') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Tour Location <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-stack-overflow"></span></span>
                                        <input type="text" class="form-control"
                                            value="{{ old('tour_location', $getRecord->tour_location) }}" required
                                            placeholder="Tour Location" name="tour_location">
                                    </div>
                                    <div style="color:red">{{ $errors->first('tour_location') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Tour Fee (Per Person) <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-money"></span></span>
                                        <input type="number" class="form-control"
                                            value="{{ old('tour_fee', $getRecord->tour_fee) }}" required placeholder="0.0"
                                            name="tour_fee">
                                    </div>
                                    <div style="color:red">{{ $errors->first('tour_fee') }}</div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Tour Staus <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <select name="is_finished" class="form-control" required>
                                        <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>

                                        <option {{ old('is_finished', $getRecord->is_finished) == '0' ? 'selected' : '' }}
                                            value="0">Upcomming
                                        </option>

                                        <option {{ old('is_finished', $getRecord->is_finished) == '1' ? 'selected' : '' }}
                                            value="1">
                                            Finished
                                        </option>



                                    </select>

                                </div>
                                <div style="color:red">{{ $errors->first('is_finished') }}</div>
                            </div>

                            @php
                                use Carbon\Carbon;
                                $getRecord->tour_date = Carbon::parse($getRecord->tour_date)->format('Y-m-d');
                            @endphp
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Tour Date <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input type="date" class="form-control"
                                            value="{{ old('tour_date', $getRecord->tour_date) }}" required
                                            name="tour_date">
                                    </div>
                                    <div style="color:red">{{ $errors->first('tour_date') }}</div>
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
