@extends('layouts._app')
@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Add Installment</li>
    </ul>
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Installment</h2>
    </div>
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Add</strong> Installment</h3>
                            <ul class="panel-controls">
                            </ul>
                        </div>

                        <div class="panel-body">
                            old('nominee_name', $getRecord->nominee_name)
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Year <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <select name="year" class="form-control">
                                        <option {{ old('year', $getRecord->year) == 2023 ? 'selected' : '' }}
                                            value="2023">2023</option>
                                        <option {{ old('year', $getRecord->year) == 2024 ? 'selected' : '' }}
                                            value="2024">2024</option>
                                        <option {{ old('year', $getRecord->year) == 2024 ? 'selected' : '' }}
                                            value="2024">2025</option>
                                        <option {{ old('year', $getRecord->year) == 2024 ? 'selected' : '' }}
                                            value="2024">2026</option>

                                    </select>
                                </div>
                                <div style="color:red">{{ $errors->first('unit') }}</div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">For Month <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <select name="month" class="form-control">
                                        <option {{ old('month', $getRecord->month) == 1 ? 'selected' : '' }} value="1">
                                            January</option>
                                        <option {{ old('month', $getRecord->month) == 2 ? 'selected' : '' }} value="2">
                                            February</option>
                                        <option {{ old('month', $getRecord->month) == 3 ? 'selected' : '' }} value="3">
                                            March</option>
                                        <option {{ old('month', $getRecord->month) == 4 ? 'selected' : '' }} value="4">
                                            April</option>
                                        <option {{ old('month', $getRecord->month) == 5 ? 'selected' : '' }}
                                            value="5">May</option>
                                        <option {{ old('month', $getRecord->month) == 6 ? 'selected' : '' }}
                                            value="6">June</option>
                                        <option {{ old('month', $getRecord->month) == 7 ? 'selected' : '' }}
                                            value="7">July</option>
                                        <option {{ old('month', $getRecord->month) == 8 ? 'selected' : '' }}
                                            value="8">August</option>
                                        <option {{ old('month', $getRecord->month) == 9 ? 'selected' : '' }}
                                            value="9">September</option>
                                        <option {{ old('month', $getRecord->month) == 10 ? 'selected' : '' }}
                                            value="10">October</option>
                                        <option {{ old('month', $getRecord->month) == 11 ? 'selected' : '' }}
                                            value="11">November</option>
                                        <option {{ old('month', $getRecord->month) == 12 ? 'selected' : '' }}
                                            value="12">December</option>
                                    </select>
                                </div>
                                <div style="color:red">{{ $errors->first('unit') }}</div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Installment Amount <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control"
                                            value="{{ old('amount', $getRecord->amount) }}" required placeholder="0.0"
                                            name="amount">
                                    </div>
                                    <div style="color:red">{{ $errors->first('amount') }}</div>
                                </div>
                            </div>
                            @php
                                use Carbon\Carbon;
                                $getRecord->last_date = Carbon::parse($getRecord->last_date)->format('Y-m-d');
                            @endphp
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Last Date <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-book"></span></span>
                                        <input type="date" class="form-control"
                                            value="{{ old('last_date', $getRecord->last_date) }}" placeholder="last_date"
                                            name="last_date">
                                    </div>
                                    <div style="color:red">{{ $errors->first('last_date') }}</div>
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
