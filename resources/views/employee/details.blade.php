@extends('layouts._app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Employee Details</li>
    </ul>
    <!-- END BREADCRUMB -->

    <div class="page-title">
        <h2><span class="fa fa-user"></span> Employee Details</h2>
    </div>

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Employee and Nominee Information</h3>
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Designation</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Present Address</th>
                                        <th>Permanent Address</th>
                                        <th>Joining Date</th>
                                        <th>NID Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $getRecord->id }}</td>
                                        <td>
                                            @if (!empty($getRecord->getProfileDirect()))
                                                <img src="{{ $getRecord->getProfileDirect() }}" alt="Employee Photo"
                                                    class="img-circle"
                                                    style="width: 60px; height: 60px; border: 2px solid #ddd;">
                                            @endif
                                        </td>
                                        <td>{{ $getRecord->name }}</td>
                                        <td>{{ $getRecord->gender }}</td>
                                        <td>{{ $getRecord->designation }}</td>
                                        <td>{{ $getRecord->email }}</td>
                                        <td>{{ $getRecord->mobile }}</td>
                                        <td>{{ $getRecord->present_address }}</td>
                                        <td>{{ $getRecord->permanent_address }}</td>
                                        <td>{{ date('d-m-Y H:i A', strtotime($getRecord->created_at)) }}</td>
                                        <td>{{ $getRecord->nid }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h4 class="mt-4">Nominee Information</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nominee Name</th>
                                        <th>Nominee NID</th>
                                        <th>Relation</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $getRecord->nominee_name }}</td>
                                        <td>{{ $getRecord->nominee_nid }}</td>
                                        <td>{{ $getRecord->nominee_relation }}</td>
                                        <td>{{ $getRecord->nominee_address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <a href="{{ url('employee/edit/' . $getRecord->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('employee/list') }}" class="btn btn-default">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
@endsection
