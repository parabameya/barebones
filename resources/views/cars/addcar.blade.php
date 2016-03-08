@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Car</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="addCarForm">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Make</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="make">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Model</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="model">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Color</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="color">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">VIN</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="vin">
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="button" id="addCarButton" class="btn btn-primary">
                                    <i class="fa fa-btn fa-plus"></i>Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
<script type="text/javascript">

    $('#addCarButton').click(function() {
        var postData = $('#addCarForm').serialize();
        $.post("{{ url('/cars/postAddCar') }}", postData, function() {
        }).done(function(response) {
                alert(response.message);
        }).error(function(response) {
            alert(response.responseJSON.message);
        });
    });
</script>
@stop