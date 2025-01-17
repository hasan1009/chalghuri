@extends('layouts._app')
@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Add Expense</li>
    </ul>
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Expense</h2>
    </div>
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Add</strong> Expense</h3>
                            <ul class="panel-controls">
                            </ul>
                        </div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Expense Date <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input type="date" class="form-control" value="{{ old('date') }}" required
                                            name="date">
                                    </div>
                                    <div style="color:red">{{ $errors->first('date') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Expense Name <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" value="{{ old('name') }}" required
                                            placeholder="Expense Name" name="name">
                                    </div>
                                    <div style="color:red">{{ $errors->first('name') }}</div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Total Amount <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-dollar"></span></span>
                                        <input type="number" class="form-control" value="{{ old('amount') }}" required
                                            placeholder="0.0" name="amount">
                                    </div>
                                    <div style="color:red">{{ $errors->first('amount') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Purchase Quantity</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="number" class="form-control" value="{{ old('number_of_purchase') }}"
                                            placeholder="0.0" name="number_of_purchase">
                                    </div>
                                    <div style="color:red">{{ $errors->first('number_of_purchase') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Unit </label>
                                <div class="col-md-6 col-xs-12">
                                    <select name="unit" class="form-control">
                                        <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>

                                        <option {{ old('unit') == 'Kg' ? 'selected' : '' }} value="Kg">
                                            Kg
                                        </option>
                                        <option {{ old('unit') == 'Litre' ? 'selected' : '' }} value="Litre">
                                            Liter
                                        </option>
                                        <option {{ old('unit') == 'Pcs' ? 'selected' : '' }} value="Pcs">
                                            Pcs
                                        </option>
                                        <option {{ old('unit') == 'Box' ? 'selected' : '' }} value="Box">
                                            Box
                                        </option>
                                        <option {{ old('unit') == 'Pair' ? 'selected' : '' }} value="Pair">
                                            Pair
                                        </option>
                                        <option {{ old('unit') == 'Miter' ? 'selected' : '' }} value="Miter">
                                            Miter
                                        </option>
                                        <option {{ old('unit') == 'Gram' ? 'selected' : '' }} value="Gram">
                                            Gram
                                        </option>

                                    </select>
                                </div>
                                <div style="color:red">{{ $errors->first('unit') }}</div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Remarks</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-book"></span></span>
                                        <input type="text" class="form-control" value="{{ old('remarks') }}"
                                            placeholder="Remarks" name="remarks">
                                    </div>
                                    <div style="color:red">{{ $errors->first('remarks') }}</div>
                                </div>
                            </div>


                            <input type="hidden", name="tour_id", value="{{ $getRecord->id }}">
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
