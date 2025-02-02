@extends('layouts._app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Asset List</li>
    </ul>
    <!-- END BREADCRUMB -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Assets</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Search Asset</h3>
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
                                        <label>Purchase Date</label>
                                        <input type="date" class="form-control" name="purchase_date"
                                            value="{{ Request::get('purchase_date') }}" placeholder="Email">

                                    </div>
                                    <div class="form-group col-md-3">
                                        <button class="btm btn-primary" type="submit"
                                            style="margin-top:25px;">Search</button>

                                        <a href="{{ url('asset/list') }}" class="btm btn-success" type="submit"
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
                        <h3 class="panel-title">Asset List (Total : {{ $getRecord->total() }})</h3>
                        <a href="{{ url('asset/print') }}" class="btn btn-info pull-right" style="margin-left: 5px"
                            target="_blank">
                            <i class="fa fas fa-print"></i> Print </a>
                        <a href="{{ url('asset/add') }}" class="btn btn-danger pull-right">+ Add Asset</a>
                    </div>
                    <div class="panel-body panel-body-table">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-actions">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Photo</th>
                                        <th>Asset Name</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Unit</th>
                                        <th>Unit Price</th>
                                        <th>Total Price</th>
                                        <th>Puchase Date</th>
                                        <th width=20%>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $key => $value)
                                        <tr id="trow_1">
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            @if (!empty($value->getProfileDirect()))
                                                <td><img src="{{ $value->getProfileDirect() }}" alt=""
                                                        style="width:60px; height:60px; border-radius: 50%; border: 2px solid #ddd;">
                                                </td>
                                            @endif()
                                            <td>{{ $value->name }}</td>
                                            <td class="ellipsis">{{ $value->description }}</td>
                                            <td>{{ $value->quantity }}</td>
                                            <td>{{ $value->unit }}</td>
                                            <td>{{ number_format($value->unit_price, 2) }} BDT</td>

                                            @php
                                                $totalPrice = $value->unit_price * $value->quantity;
                                            @endphp
                                            <td>{{ number_format($totalPrice, 2) }} BDT</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->purchase_date)) }}
                                            </td>
                                            <td>
                                                <a href="{{ url('asset/edit/' . $value->id) }}"
                                                    class="btn btn-default btn-rounded btn-sm"><span
                                                        class="fa fa-pencil"></a>
                                                <form action="{{ url('asset/delete/' . $value->id) }}" method="POST"
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
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>

            </div>
        </div>

    </div>
@endsection
<style>
    td.ellipsis {
        max-width: 150px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

@section('script')
@endsection
