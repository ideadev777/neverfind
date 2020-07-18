

<style type="text/css">
	
</style>
	<?php
	$attr ;
	$str ;
	switch ($status) {
		case 1:
			$attr = "primary" ;
			$str = "Accepted" ;		
			break;
		case 2:
			$attr = "secondary" ;
			$str = "On Service" ;		
			break;
		case 3:
			$attr = "info" ;
			$str = "Payment Requested" ;		
			break;
		case 4:
			$attr = "warning" ;
			$str = "Payment Finished" ;		
			break;
		case 5:
			$attr = "dark" ;
			$str = "Finished" ;		
			break;
		default:
			$attr = "danger" ;
			$str = "New" ;
			# code...
			break;
	}
	?>
<div class="btn-group dropdown col-md-12">
	<button type="button" class="btn btn-{{$attr}} col-md-10">{{$str}}</button>
	<button type="button" class="btn btn-{{$attr}} dropdown-toggle dropdown-toggle-split col-md-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<span class="sr-only">Toggle Dropdown</span>
	</button>
	<div class="dropdown-menu">

	<a class="dropdown-item" href="javascript:void(0);" id="change-status" data-toggle="tooltip" data-original-title="Delete" data-id="{{ $id }}" data-status="0" data-prev="{{$status}}">New</a>
	<a class="dropdown-item" href="javascript:void(0);" id="change-status" data-toggle="tooltip" data-original-title="Delete" data-id="{{ $id }}" data-status="1" data-prev="{{$status}}">Accepted</a>
	<a class="dropdown-item" href="javascript:void(0);" id="change-status" data-toggle="tooltip" data-original-title="Delete" data-id="{{ $id }}" data-status="2" data-prev="{{$status}}">On Service</a>
	<a class="dropdown-item" href="javascript:void(0);" id="change-status" data-toggle="tooltip" data-original-title="Delete" data-id="{{ $id }}" data-status="3" data-prev="{{$status}}">Payment Requested</a>
	<a class="dropdown-item" href="javascript:void(0);" id="change-status" data-toggle="tooltip" data-original-title="Delete" data-id="{{ $id }}" data-status="4" data-prev="{{$status}}">Payment Finished</a>
	<a class="dropdown-item" href="javascript:void(0);" id="change-status" data-toggle="tooltip" data-original-title="Delete" data-id="{{ $id }}" data-status="5" data-prev="{{$status}}">Finished</a>
	</div>
</div>
