@extends('layouts.master')

@section('content')
	<div class="main-wrapper">
		<div class="results-wrapper">
			
		<div class="result result-create-new">
			<a href="{{ route('member.create') }}" class="create-new">
				<div class="text-container">
					<h2 class="plus">+</h2>
					<h2 class="add-new">Add new</h2>	
				</div>
			</a>
		</div>


		<!-- loop to create all the profile pics and such -->
			<?php for ($i=0; $i<15; $i++) {?>
				<div class="result">
				<div class="dot"></div>
					<form action="">
						<input type="checkbox" id="cb<?php echo $i ?>">
						<label for="cb<?php echo $i ?>"></label>
					</form>
					<img class="pic" src="{{ asset('img/test.jpg') }}"/>
					<p class="name">Test Name</p>
				</div>
			<?php } ?>
			<!--  -->



		</div>
	</div>


@stop
