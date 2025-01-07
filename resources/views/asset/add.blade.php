@extends('layouts._app')
@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Add Asset</li>
    </ul>
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Company Assets</h2>
    </div>
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Add</strong> Asset</h3>
                            <ul class="panel-controls">
                            </ul>
                        </div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Asset Name <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-stack-overflow"></span></span>
                                        <input type="text" class="form-control" value="{{ old('name') }}" required
                                            placeholder="Asset Name" name="name">
                                    </div>
                                    <div style="color:red">{{ $errors->first('name') }}</div>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Description </label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <textarea name="description" class="form-control"></textarea>
                                    </div>
                                    <div style="color:red">{{ $errors->first('description') }}</div>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Asset Photo</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-image"></span></span>
                                        <input type="file" class="form-control" style="padding: 5px" name="photo">
                                    </div>
                                    <div style="color:red">{{ $errors->first('photo') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Unit Price <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-dollar"></span></span>
                                        <input type="number" class="form-control" value="{{ old('unit_price') }}" required
                                            placeholder="0.0" name="unit_price" step="0.01">
                                    </div>
                                    <div style="color:red">{{ $errors->first('unit_price') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Quantity <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="number" class="form-control" value="{{ old('quantity') }}" required
                                            placeholder="0.0" name="quantity" step="0.01">
                                    </div>
                                    <div style="color:red">{{ $errors->first('quantity') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Unit <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <select name="unit" class="form-control" required>
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
                                <label class="col-md-3 col-xs-12 control-label">Purchase Date <span
                                        style="color:red;">*</span></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input type="date" class="form-control" value="{{ old('purchase_date') }}"
                                            required placeholder="Unit Price" name="purchase_date">
                                    </div>
                                    <div style="color:red">{{ $errors->first('purchase_date') }}</div>
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
