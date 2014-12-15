@extends('layouts.master')

@section('content')

<div class="main-wrapper">

	@foreach($members as $member) 
		
		<a href="{{ route('member.show', $member->MemberId) }}">
			
			<div class="admin-member-container">

				<div class="admin-member-image" style="background-image:url({{ $member->ImagePath }})"></div>
				<p>{{ $member->NameFirst }} {{ $member->NameLast }}</p>

			</div>
			
		</a>

	@endforeach

</div>



@stop