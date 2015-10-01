@extends ('layouts.master')

@section ('content')


	<div class="addmember-wrapper" ng-controller="CreateMemberController">

		<div class="Card">

			<div class="Card-title">Add New Member</div>

			<div class="Card-content">

				{{ Form::open(array('route' => 'member.store', 'files' => true, 'class' => 'Form')) }}

					<div class="Form-group">

						<label for="firstname">First Name</label>
						{{ Form::text('firstname','',['placeholder' => 'John']) }}	

					</div>
					
					<div class="Form-group">

						<label for="lastname">Last Name</label>
						{{ Form::text('lastname','', ['placeholder' => 'Doe']) }}

					</div>
					
					<div class="Form-group">

						<label for="image-upload">Upload Profile Picture</label>
						{{--  {{ Form::file('image-upload') }}  --}}
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

					</div>
					

					<div class="Form-group">

						<label for="phone">Phone</label>
						{{ Form::text('phone', '', ['placeholder' => '000.000.0000']) }}

					</div>
					

					<div class="Form-group">

						<label for="email">Email</label>
						{{ Form::email('email', '', ['placeholder' => 'name@email.com']) }}

					</div>
					

					<div class="Form-group">

						<label for="address">Address</label>
						{{ Form::text('address', '', ['placeholder' => '1234 Main St, City ST 00000']) }}

					</div>
					
					<div class="Form-group">

						<label for="parent-name-1">First Parent Name</label>
						{{ Form::text('parent-name-1', '', ['placeholder' => 'Jane Doe']) }}

					</div>
					
					<div class="Form-group">

						<label for="parent-name-2">Second Parent Name</label>
						{{ Form::text('parent-name-2', '', ['placeholder' => 'John Doe Sr.']) }}

					</div>

					<div class="Form-group">

						<label for="parent-contact">Parent Contact Phone</label>
						{{ Form::text('parent-contact', '', ['placeholder' => '000.000.0000']) }}

					</div>
				

					{{ Form::submit('√')}}
					
				{{ Form::close() }}

			</div>

		</div>

		
	
	</div>




@stop
