@extends('layout/app')

@section('title', 'Order')

@section('content')
<div align="center">
	<div align="left" style="width:80%;">
		<form action="/order" method="POST" >
			@csrf
			<p>Name</p>
			<input class="w3-input w3-border" name="name" type="text" placeholder="">
			<p>Email</p>
			<input class="w3-input w3-border" name="email" type="text" placeholder="">
			<p>Mobile Phone Number</p>
			<input class="w3-input w3-border" name="phonenumber" type="text" placeholder="">
			<p>Address</p>
			<input class="w3-input w3-border" name="address" type="text" placeholder="">
			<p>Service Type</p>
			<select class="w3-block" name="service_id" id="cars">
		    @foreach ($services as $result)
				<option value={{$result->id}}> {{$result->name}} </option>
			@endforeach
			</select>
			<p>Start Date</p>
			<input name="startdate" placeholder="MM/DD/YYYY">
			<p>End Date</p>
			<input name="enddate" placeholder="MM/DD/YYYY">
			<button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Order Now</button>
		</form>
	</div>
</div>
@endsection
