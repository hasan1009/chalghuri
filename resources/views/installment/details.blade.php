@extends('layouts._app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Employee List</li>
    </ul>
    <!-- END BREADCRUMB -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Collection Details</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                @include('_message')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Search Employee</h3>
                    </div>

                    <div class="panel-body">
                        <form method="get" action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label>ID</label>
                                        <input type="number" class="form-control" name="id"
                                            value="{{ Request::get('id') }}" placeholder="ID">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ Request::get('name') }}" placeholder="Name">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Mobile Number</label>
                                        <input type="text" class="form-control" name="mobile"
                                            value="{{ Request::get('mobile') }}" placeholder="Mobile Number">

                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ Request::get('email') }}" placeholder="Email">

                                    </div>
                                    <div class="form-group col-md-3">
                                        <button class="btm btn-primary" type="submit"
                                            style="margin-top:25px;">Search</button>

                                        <a href="{{ url(url('installment/details/' . $getInstallment->id)) }}"
                                            class="btm btn-success" type="submit"
                                            style="margin-top:35px; padding: 4px 15px;">Clear</a>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @include('_message')
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

                        <h3 class="panel-title"><strong>Month:</strong> {{ $months[$getInstallment->month] ?? 'Unknown' }} |
                            <strong>Year:</strong>
                            {{ $getInstallment->year }}
                        </h3>
                        <a href="{{ url('installment/print/' . $getInstallment->id) }}" class="btn btn-info pull-right"
                            style="margin-left: 5px" target="_blank">
                            <i class="fa fas fa-print"></i> Print
                        </a>
                    </div>
                    <div class="panel-body panel-body-table">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-actions">
                                <thead>
                                    <tr>
                                        <th width="50">id</th>
                                        <th width="50">Photo</th>
                                        <th width="150">Name</th>
                                        <th width="50">Designation</th>
                                        <th width="200">Mobile</th>
                                        <th width="200">Total Installment</th>
                                        <th width="200">Total Paid</th>
                                        <th width="200">Total Due</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getEmployee as $value)
                                        <tr id="trow_1">
                                            <td class="text-center">{{ $value->id }}</td>
                                            @if (!empty($value->getProfileDirect()))
                                                <td><img src="{{ $value->getProfileDirect() }}" alt=""
                                                        style="width:60px; height:60px; border-radius: 50%; border: 2px solid #ddd;">
                                                </td>
                                            @endif()
                                            <td><strong>{{ $value->name }}</strong></td>
                                            <td><strong>{{ $value->designation }}</strong></td>
                                            <td><strong>{{ $value->mobile }}</strong></td>
                                            <td><strong>{{ number_format($getInstallment->amount, 2) }} taka</strong></td>
                                            <td><strong>{{ number_format($value->total_collected, 2) }} taka</strong></td>
                                            <td><strong>{{ number_format($getInstallment->amount - $value->total_collected, 2) }}
                                                    taka</strong>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>
                <div style="padding: 10px; float:right;">
                    {!! $getEmployee->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>

            </div>
        </div>

    </div>
@endsection


@section('script')
@endsection










{{-- @extends('layouts._app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Employee List</li>
    </ul>
    <!-- END BREADCRUMB -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Employee</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                @include('_message')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Search Employee</h3>
                    </div>
                    <div class="panel-body">
                        <form method="get" action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label>ID</label>
                                        <input type="number" class="form-control" name="id"
                                            value="{{ Request::get('id') }}" placeholder="ID">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ Request::get('name') }}" placeholder="Name">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Mobile Number</label>
                                        <input type="text" class="form-control" name="mobile"
                                            value="{{ Request::get('mobile') }}" placeholder="Mobile Number">

                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ Request::get('email') }}" placeholder="Email">

                                    </div>
                                    <div class="form-group col-md-3">
                                        <button class="btm btn-primary" type="submit"
                                            style="margin-top:25px;">Search</button>

                                        <a href="{{ url('employee/list') }}" class="btm btn-success" type="submit"
                                            style="margin-top:35px; padding: 4px 15px;">Clear</a>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>


                    <div class="panel-heading">
                        <h3 class="panel-title">Employee List (Total : {{ $getEmployee->total() }})</h3>
                        <a href="{{ url('employee/add') }}" class="btn btn-danger pull-right">+ Add Employee</a>
                    </div>
                    <div class="panel-body panel-body-table">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-actions">
                                <thead>
                                    <tr>
                                        <th width="50">ID</th>
                                        <th width="50">Photo</th>
                                        <th width="150">Name</th>
                                        <th width="50">Designation</th>
                                        <th width="200">Mobile</th>
                                        <th width="200">Total Installment</th>
                                        <th width="200">Total Paid</th>
                                        <th width="200">Total Due</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getEmployee as $value)
                                        <tr id="trow_{{ $value->id }}">
                                            <td class="text-center">{{ $value->id }}</td>
                                            @if (!empty($value->getProfileDirect()))
                                                <td>
                                                    <img src="{{ $value->getProfileDirect() }}" alt=""
                                                        style="width:60px; height:60px; border-radius: 50%; border: 2px solid #ddd;">
                                                </td>
                                            @else
                                                <td>No Image</td>
                                            @endif
                                            <td><strong>{{ $value->name }}</strong></td>
                                            <td><strong>{{ $value->designation }}</strong></td>
                                            <td><strong>{{ $value->mobile }}</strong></td>
                                            <td><strong>{{ number_format($getInstallment->amount, 2) }}</strong></td>
                                            <td><strong>{{ number_format($value->total_collected, 2) }}</strong></td>
                                            <td><strong>{{ number_format($getInstallment->amount - $value->total_collected, 2) }}
                                                    taka</strong>
                                            </td>
                                            <td>
                                                <a href="{{ url('employee/edit/' . $value->id) }}"
                                                    class="btn btn-default btn-rounded btn-sm">
                                                    <span class="fa fa-pencil"></span>
                                                </a>
                                                <a href="{{ url('employee/details/' . $value->id) }}"
                                                    class="btn btn-default btn-rounded btn-sm">Details</a>
                                                <form action="{{ url('employee/delete/' . $value->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-rounded btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete?')">
                                                        <span class="fa fa-times"></span>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div style="padding: 10px; float:right;">
                    {!! $getEmployee->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection --}}
