@extends('layouts._app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Tour List</li>
    </ul>
    <!-- END BREADCRUMB -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Tours</h2>

    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Search Tour</h3>
                    </div>

                    <div class="panel-body">
                        <form method="get" action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label>Tour ID</label>
                                        <input type="number" class="form-control" name="id"
                                            value="{{ Request::get('id') }}" placeholder="ID">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Tour Name</label>
                                        <input type="text" class="form-control" name="tour_name"
                                            value="{{ Request::get('tour_name') }}" placeholder="Tour Name">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Tour Date</label>
                                        <input type="date" class="form-control" name="tour_date"
                                            value="{{ Request::get('tour_date') }}">

                                    </div>
                                    <div class="form-group col-md-3">
                                        <button class="btm btn-primary" type="submit"
                                            style="margin-top:25px;">Search</button>

                                        <a href="{{ url('tour/list') }}" class="btm btn-success" type="submit"
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
                        <h3 class="panel-title">Tour List (Total : {{ $getRecord->total() }})</h3>
                        <a href="{{ url('tour/add') }}" class="btn btn-danger pull-right">+ Add Tour</a>
                    </div>
                    <div class="panel-body panel-body-table">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-actions">
                                <thead>
                                    <tr>
                                        <th width="50">id</th>
                                        <th>Tour Name</th>
                                        <th>Description</th>
                                        <th>Tour Location</th>
                                        <th>Tour Date</th>
                                        <th>Tour Fee</th>
                                        <th>Status</th>
                                        <th width=20%>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                        <tr id="trow_1">
                                            <td class="text-center">{{ $value->id }}</td>
                                            <td><strong>{{ $value->tour_name }}</strong></td>
                                            <td><strong>{{ $value->tour_description }}</strong></td>
                                            <td><strong>{{ $value->tour_location }}</strong></td>

                                            <td><strong>{{ date('d-m-Y H:i A', strtotime($value->tour_date)) }}</strong>
                                            <td><strong>{{ $value->tour_fee }} tk</strong></td>
                                            <td>
                                                <span
                                                    class="label {{ $value->is_finished ? 'label-danger' : 'label-success' }}">
                                                    {{ $value->is_finished ? 'Tour Finished' : 'Upcoming' }}
                                                </span>
                                            </td>

                                            <td>
                                                <a href="{{ url('tour/details/' . $value->id) }}"
                                                    class="btn btn-default btn-rounded btn-sm">Details</a>
                                                <a href="{{ url('tour/edit/' . $value->id) }}"
                                                    class="btn btn-default btn-rounded btn-sm"><span
                                                        class="fa fa-pencil"></a>
                                                <form action="{{ url('tour/delete/' . $value->id) }}" method="POST"
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


@section('script')
@endsection
