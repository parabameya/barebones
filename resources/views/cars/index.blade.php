@extends('layouts.app')

@section('content')
<div class="container">
    <div class="content">
        <h3>Here you can see the cars which you own </h3>
        <table class="table datatable" id="displayCarData">
        </table>
    </div>
</div>
<div id="field" data-field-id="{{$cars}}"></div>
@endsection

@section('page-script')
<script type="text/javascript">
    $(document).ready(function() {
    	var data = $('#field').data("field-id");
		$('#displayCarData').DataTable({
	        data: data,
	        columnDefs: [
	        	{
	        		render : function(data) {
	        			var date = new Date(data);
	        			return date.toLocaleString();
	        		},
	        		targets : 0
	        	},
	        	{
	        		visible : true,
	        		targets : [1,2,3,4] 
	        	}
	        ],
	        columns: [
	        	{ "data" : "created_at", 'title': 'Date' },
	            { "data": "make", "title": "Make" },
	            { "data": "model", "title": "Model" },
	            { "data": "color", "title": "Color" },
	            { "data": "vin", "title": "Vin" }
	        ]
	    });
    });
</script>
@stop