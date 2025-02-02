@extends('layouts._app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Installment List</li>
    </ul>
    <!-- END BREADCRUMB -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Installment</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Search Installment</h3>
                    </div>

                    <div class="panel-body">
                        <form method="get" action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label>Year</label>
                                        <select name="year" class="form-control">
                                            <option>
                                                Select Year
                                            </option>
                                            <option {{ Request::get('year') == 2023 ? 'selected' : '' }} value="2023">
                                                2023
                                            </option>
                                            <option {{ Request::get('year') == 2024 ? 'selected' : '' }} value="2024">
                                                2024
                                            </option>
                                            <option {{ Request::get('year') == 2025 ? 'selected' : '' }} value="2025">
                                                2025
                                            </option>
                                            <option {{ Request::get('year') == 2026 ? 'selected' : '' }} value="2026">
                                                2026
                                            </option>

                                        </select>

                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Last Date</label>
                                        <input type="date" class="form-control" name="last_date"
                                            value="{{ Request::get('last_date') }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button class="btm btn-primary" type="submit"
                                            style="margin-top:25px;">Search</button>

                                        <a href="{{ url('installment/list') }}" class="btm btn-success" type="submit"
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
                        <h3 class="panel-title">Installment List (Total : {{ $getRecord->total() }})</h3>
                        <a href="{{ url('installment/add') }}" class="btn btn-danger pull-right">+ Add Installment</a>
                    </div>
                    <div class="panel-body panel-body-table">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-actions">
                                <thead>
                                    <tr>
                                        <th width="50">#Sl</th>
                                        <th>Month</th>
                                        <th>Year</th>
                                        <th>Amount</th>
                                        <th>Last Date</th>
                                        <th width=20%>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
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
                                    @foreach ($getRecord as $key => $value)
                                        <tr id="trow_1">
                                            <td class="text-center">{{ $getRecord->firstItem() + $key }}</td>
                                            <td><strong>{{ $months[$value->month] ?? 'Unknown' }}</strong></td>
                                            <td><strong>{{ $value->year }}</strong></td>
                                            <td><strong>{{ number_format($value->amount, 2) }} BDT</strong></td>
                                            <td><strong>{{ date('d-m-Y H:i A', strtotime($value->last_date)) }}</strong>
                                            </td>
                                            <td>
                                                <a href="{{ url('installment/edit/' . $value->id) }}"
                                                    class="btn btn-default btn-rounded btn-sm"><span
                                                        class="fa fa-pencil"></a>

                                                <form action="{{ url('installment/delete/' . $value->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ url('installment/details/' . $value->id) }}"
                                                        class="btn btn-default btn-rounded btn-sm">Details</a>
                                                    <a href="{{ url('installment/collection/' . $value->id) }}"
                                                        class="btn btn-info btn-rounded btn-sm">Collection</a>
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
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>

            </div>
        </div>

    </div>
@endsection


@section('script')
@endsection
