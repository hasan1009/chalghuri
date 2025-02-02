@extends('layouts._app')
@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Collection</li>
    </ul>
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Collection</h2>
    </div>
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @php
                                $months = [
                                    1 => 'January',
                                    2 => 'February',
                                    3 => 'March',
                                    4 => 'April',
                                    5 => 'May',
                                    6 => 'June',
                                    7 => 'July',
                                    8 => 'August',
                                    9 => 'September',
                                    10 => 'October',
                                    11 => 'November',
                                    12 => 'December',
                                ];
                            @endphp
                            <h3 class="panel-title"><strong>Month:</strong>
                                {{ $months[$getRecord->month] ?? 'Unknown' }} | <strong>Year:</strong>
                                {{ $getRecord->year }}</h3>
                            <ul class="panel-controls">
                            </ul>
                        </div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Select Employee <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <select name="employee_id" class="form-control" required>
                                        <option>Select Employee</option>
                                        @foreach ($getEmployee as $value)
                                            <option {{ old('employee_id') == $value->id ? 'selected' : '' }}
                                                value={{ $value->id }}>
                                                {{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div style="color:red">{{ $errors->first('employee_id') }}</div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Collected Amount <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="number" class="form-control" value="{{ old('collected_amount') }}"
                                            required placeholder="0.0" name="collected_amount">
                                    </div>
                                    <div style="color:red">{{ $errors->first('collected_amount') }}</div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Collection Date <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-book"></span></span>
                                        <input type="date" class="form-control" value="{{ old('collection_date') }}"
                                            placeholder="Collection Date" name="collection_date" required>
                                    </div>
                                    <div style="color:red">{{ $errors->first('collection_date') }}</div>
                                </div>
                            </div>

                            <input type="hidden" class="form-control" value="{{ $getRecord->id }}"
                                placeholder="installment Id" name="installment_id">
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
