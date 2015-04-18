@extends ('layouts.master')

@section ('content')


	<div class="addmember-wrapper" ng-controller="CreateMemberController">
		<h2 class="title">Add New Member</h2>
		<div class="color-wrap">

			{{ Form::open(array('route' => 'member.store', 'files' => true)) }}
				<label for="firstname">First Name</label>
				<p>{{ Form::text('firstname','',['placeholder' => 'John']) }}</p>
				<label for="lastname">Last Name</label>
				<p>{{ Form::text('lastname','', ['placeholder' => 'Doe']) }}</p>

				<label for="image-upload">Upload Profile Picture</label>
				{{-- <p> {{ Form::file('image-upload') }} </p> --}}
				<div class="photo-upload-field">
					<i class="fa fa-plus" ng-show="plus"></i>

					<div class="photo-upload-photo" style="background-image: url(@{{ image }})"></div>

					<div class="spinner" ng-show="spinner" ng-cloak>
						<div class="double-bounce1"></div>
						<div class="double-bounce2"></div>
					</div>
					<!-- This input is used for the front end data retreival via Angular.  -->
					{{-- <div name="angular-upload" id="angular-upload" ng-file-select ng-file-change="onFileSelect($files)"></div> --}}
					<div name="angular-upload" id="angular-upload" ng-file-select ng-model="files"></div>

					<!-- This input recieves the returned path of the uploaded image to be used when the entire form is submitted -->
					<input type="text" value="@{{ image }}" id="imagePath" name="imagePath" class="post-image-path" >
				</div>


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
