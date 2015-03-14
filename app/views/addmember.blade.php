@extends ('layouts.master')

@section ('content')


	<div class="addmember-wrapper">
		<h2 class="title">Add New Member</h2>
		<div class="color-wrap">

			{{ Form::open(array('route' => 'member.store', 'files' => true)) }}
				<label for="firstname">First Name</label>
				<p>{{ Form::text('firstname','',['placeholder' => 'John']) }}</p>
				<label for="lastname">Last Name</label>
				<p>{{ Form::text('lastname','', ['placeholder' => 'Doe']) }}</p>
				<label for="image-upload">Upload Profile Picture</label>
				<p> {{ Form::file('image-upload') }} </p>
				<label for="phone">Phone</label>
				<p>{{ Form::text('phone', '', ['placeholder' => '000.000.0000']) }}</p>
				<label for="email">Email</label>
				<p>{{ Form::email('email', '', ['placeholder' => 'name@email.com']) }}</p>
				<label for="address">Address</label>
				<p>{{ Form::text('address', '', ['placeholder' => '1234 Main St, City ST 00000']) }}</p>
				<!-- <p>{{ Form::text('city', '', ['placeholder' => 'City']) }}</p> -->
				<label for="parent-name-1">First Parent Name</label>
				<p>{{ Form::text('parent-name-1', '', ['placeholder' => 'Jane Doe']) }}</p>
				<label for="parent-name-2">Second Parent Name</label>
				<p>{{ Form::text('parent-name-2', '', ['placeholder' => 'John Doe Sr.']) }}</p>
				<label for="parent-contact">Parent Contact Phone</label>
				<p>{{ Form::text('parent-contact', '', ['placeholder' => '000.000.0000']) }}</p>
				{{ Form::submit('√')}}
			{{ Form::close() }}
		</div>
	</div>




@stop
