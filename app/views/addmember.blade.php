@extends ('layouts.master')

@section ('content')


	<div class="addmember-wrapper" ng-controller="CreateMemberController">

		<div class="Card" ng-show="!created">

			<div class="Card-title">Add New Member</div>

			<div class="Card-content">

				{{-- {{ Form::open(array('route' => 'member.store', 'files' => true, 'class' => 'Form')) }} --}}
				<div class="Form">

					<div class="Form-group">

						<label for="firstname">First Name</label>
						<input type="text" name="firstname" ng-model="member.firstName" placeholder="First Name">	

					</div>
					
					<div class="Form-group">

						<label for="lastname">Last Name</label>
		
						<input type="text" ng-model="member.lastName" placeholder="Last Name">

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
							{{-- <input type="text" value="@{{ image }}" id="imagePath" name="imagePath" class="post-image-path" ng-model="member.image"> --}}
						</div>

					</div>
					

					<div class="Form-group">

						<label for="birthday">Birthday</label>
						
						<input type="date" name="birthday" ng-model="member.birthDate" placeholder="Birthday">

					</div>

					<div class="Form-group">

						<label for="phone">Home Phone</label>
						
						<input type="tel" name="phone" ng-model="member.phone" placeholder="Phone Number">

					</div>
					
					<div class="Form-group">

						<label for="emergency-contact-name">Emergency Contact Name</label>
						<input type="text" name="emergency-contact-name" ng-model="member.emergencyContactName" placeholder="Emergency Contact Name">

					</div>

					<div class="Form-group">

						<label for="emergency-contact-phone">Emergency Contact Phone</label>
						<input type="text" name="emergency-contact-phone" ng-model="member.emergencyContactPhone" placeholder="Emergency Contact Phone">

					</div>

					{{-- <div class="Form-group">

						<label for="email">Email</label>
						<input type="text" name="email" ng-model="member.email" placeholder="Email">

					</div> --}}
					

					<div class="Form-group">

						<label for="address">Address</label>
						<input type="text" name="address" ng-model="member.address" placeholder="Address">

					</div>
					
					<div class="Form-group Form-group--two-thirds Form-group--withPadding">

						<label for="city">City</label>
						<input type="text" name="city" ng-model="member.city" placeholder="City">

					</div>

					<div class="Form-group Form-group--one-third">

						<label for="zip">Zip</label>
						<input type="text" name="zip" ng-model="member.zip" placeholder="Zip">

					</div>
					
					<div class="clear"></div>

					{{-- {{ Form::submit('√')}} --}}
					<input type="submit" value="√" ng-click="saveMember()"></input>
					
				{{-- {{ Form::close() }} --}}
				</div>

			</div>

		</div>

		<div class="Card" ng-show="created">

			<div class="Card-title">Check-in new member?</div>

			<div class="Card-content">

				@{{ createdMember.firstName }} was successfully added to the system. Would you like to check them in?

				<div class="Button-group">
					<div class="Button Button--success" ng-click="checkInNewMember()">Yes</div>
					<div class="Button Button--neutral" ng-click="redirectToDashboard();">Not now</div>
				</div>
				

			</div>

		</div>
	
	</div>

@stop
