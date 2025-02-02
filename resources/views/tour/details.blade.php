@extends('layouts._app')
@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Tour Details</li>
    </ul>
    <!-- END BREADCRUMB -->
    <div class="page-title">
        <h2><span class="fa fa-user"></span> Tour Details</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                @include('_message')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tour Information</h3>
                        <a href="{{ url('tour/expenseprint/' . $getRecord->id) }}" class="btn btn-info pull-right"
                            style="margin-left: 5px" target="_blank">
                            <i class="fa fas fa-print"></i> Expense
                        </a>
                        <a href="{{ url('tour/memberprint/' . $getRecord->id) }}" class="btn btn-info pull-right"
                            target="_blank">
                            <i class="fa fas fa-print"></i> Member Info
                        </a>
                        <a href="{{ url('expense/add/' . $getRecord->id) }}" class="btn btn-danger pull-right"
                            style="margin:0 5px">+ Add
                            Expanse</a>
                        <a href="{{ url('member/add/' . $getRecord->id) }}" class="btn btn-primary pull-right">+ Add
                            Member</a>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-5">
                                <h4 class="mt-4">Tour Members</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="memberTable">
                                        <thead>
                                            <tr>
                                                <th width='50'>Member ID</th>
                                                <th>Profile Photo</th>
                                                <th>Member Name</th>
                                                <th>Member Mobile</th>
                                                <th>Address</th>
                                                <th>Paid Amount</th>
                                                <th>Discount</th>
                                                <th>Due Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $amount_due = 0;
                                                $totalget = 0;
                                                $totaldue = 0;
                                            @endphp
                                            @foreach ($getMember as $value)
                                                @php
                                                    $totalget += $value->paid_amount;

                                                @endphp
                                                <tr>
                                                    <td>{{ $value->id }}</td>
                                                    @if (!empty($value->getProfileDirect()))
                                                        <td><img src="{{ $value->getProfileDirect() }}" alt=""
                                                                style="width:60px; height:60px; border-radius: 50%; border: 2px solid #ddd;">
                                                        </td>
                                                    @endif
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->mobile }}</td>
                                                    <td>{{ $value->address }}</td>
                                                    @php
                                                        $rest_amount = $getRecord->tour_fee - $value->discount;
                                                        $amount_due = $rest_amount - $value->paid_amount;
                                                        $totaldue += $amount_due;
                                                    @endphp
                                                    <td>{{ $value->paid_amount }} tk</td>
                                                    <td>{{ $value->discount }} tk</td>
                                                    <td>{{ number_format($amount_due, 2) }} tk</td>
                                                    <td>
                                                        <a href="{{ url('member/edit/' . $value->id) }}"
                                                            class="btn btn-default btn-rounded btn-sm"><span
                                                                class="fa fa-pencil"></a>
                                                        <form action="{{ url('member/delete/' . $value->id) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-rounded btn-sm"
                                                                onclick="return confirm('Are you sure you want to delete this member from tour?')">
                                                                <span class="fa fa-times"></span>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>

                                                <th colspan="5" style="text-align: left;">Total</th>
                                                <th colspan="1" style="text-align: center;">
                                                    {{ number_format($totalget, 2) }} Taka
                                                </th>
                                                <th colspan="1"></th>
                                                <th colspan="1" style="text-align: center;">
                                                    {{ number_format($totaldue, 2) }} Taka
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h4 class="mt-4">Tour Expense</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="expenseTable">
                                        <thead>
                                            <tr>
                                                <th width='50'>Expense ID</th>
                                                <th>Expense Date</th>
                                                <th>Type of Expense</th>
                                                <th>Expense Amount</th>
                                                <th>Purchase Quantity</th>
                                                <th>Unit</th>
                                                <th>Remarks</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $totalExpense = 0;
                                            @endphp

                                            @foreach ($getExpense as $value)
                                                @php
                                                    $totalExpense += $value->amount;
                                                @endphp
                                                <tr>
                                                    <td>{{ $value->id }}</td>
                                                    <td>{{ date('d-m-Y H:i A', strtotime($value->date)) }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->amount }}</td>
                                                    <td>{{ $value->number_of_purchase }}</td>
                                                    <td>{{ $value->unit }}</td>
                                                    <td>{{ $value->remarks }}</td>
                                                    <td>
                                                        <a href="{{ url('expense/edit/' . $value->id) }}"
                                                            class="btn btn-default btn-rounded btn-sm"><span
                                                                class="fa fa-pencil"></a>
                                                        <form action="{{ url('expense/delete/' . $value->id) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-rounded btn-sm"
                                                                onclick="return confirm('Are you sure you want to delete this expense?')">
                                                                <span class="fa fa-times"></span>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="3" style="text-align: left;">Total Expense</th>
                                                <th colspan="5" style="text-align: center;">
                                                    {{ number_format($totalExpense, 2) }} Taka
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ url('tour/edit/' . $getRecord->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('tour/list') }}" class="btn btn-default">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
