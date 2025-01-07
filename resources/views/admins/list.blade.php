@extends('layouts._app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Admin List</li>
    </ul>
    <!-- END BREADCRUMB -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Admins</h2>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Admin List (Total : {{ $getRecord->total() }})</h3>
                        <a href="{{ url('admins/add') }}" class="btn btn-danger pull-right">+ Add Admin</a>
                    </div>

                    <div class="panel-body panel-body-table">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-actions">
                                <thead>
                                    <tr>
                                        <th width="50">id</th>
                                        <th>Photo</th>
                                        <th>name</th>
                                        <th>Designation</th>
                                        <th>Email</th>
                                        <th>Joining Date</th>
                                        <th width=15%>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                        <tr id="trow_1">
                                            <td class="text-center">{{ $value->id }}</td>
                                            @if (!empty($value->getProfileDirect()))
                                                <td><img src="{{ $value->getProfileDirect() }}" alt=""
                                                        style="width:60px; height:60px; border-radius: 50%; border: 2px solid #ddd;">
                                                </td>
                                            @endif()
                                            <td><strong>{{ $value->name }}</strong></td>
                                            <td><span class="label label-success">{{ $value->designation }}</span></td>
                                            <td><strong>{{ $value->email }}</strong></td>
                                            <td><strong>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</strong>
                                            </td>
                                            <td>
                                                <button class="btn btn-default btn-rounded btn-sm"><span
                                                        class="fa fa-pencil"></span></button>
                                                <button class="btn btn-danger btn-rounded btn-sm"
                                                    onClick="delete_row('trow_1');"><span
                                                        class="fa fa-times"></span></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection


@section('script')
@endsection
